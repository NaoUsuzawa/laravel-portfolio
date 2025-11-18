<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    private $conversation;
    private $follow;

    public function __construct(Conversation $conversation, Follow $follow)
    {
        $this->conversation = $conversation;
        $this->follow = $follow;

    }

    public function start_conversation(Request $request){

        $user_id = Auth::id();
        $receiver_id = $request->input('receiver_id');

        // check exist of conversation
        $conversation = $this->conversation
                ->where(function ($q) use ($user_id, $receiver_id) {
                $q->where('user1_id', $user_id)
                  ->where('user2_id', $receiver_id);
                })
                ->orWhere(function ($q) use ($user_id, $receiver_id) {
                    $q->where('user1_id', $receiver_id)
                    ->where('user2_id', $user_id);
                })
                ->first();
        
        
        if(!$conversation){
            // if the conversation is not exist, create new
            $conversation = $this->conversation->create([
                'user1_id' => $user_id,
                'user2_id' => $receiver_id,
            ]);
        }

        return redirect()->route('messages.show', ['conversation_id' => $conversation->id]);
    }

    private function getExcludedUserIds(int $user_id): array
    {
        $existingConversationUserIds1 = $this->conversation
            ->where('user1_id', $user_id)
            ->pluck('user2_id')
            ->toArray();

        $existingConversationUserIds2 = $this->conversation
            ->where('user2_id', $user_id)
            ->pluck('user1_id')
            ->toArray();

        return array_merge($existingConversationUserIds1, $existingConversationUserIds2, [$user_id]);
    }

    public function index(){
        
        $user_id = Auth::id();

        // get the usersID who are talking
        $excludeUserIds = $this->getExcludedUserIds($user_id);

        $followings = $this->follow
                            ->where('follower_id', $user_id)
                            ->whereNotIn('following_id', $excludeUserIds)
                            ->with('following')
                            ->get();
        
        $conversations = $this->conversation
                            ->where('user1_id', $user_id)
                            ->orWhere('user2_id', $user_id)
                            ->with(['user1', 'user2', 'lastMessage'])
                            ->latest('updated_at')
                            ->get();

        return view('messages.message', [
        'conversation' => null,
        'conversations' => $conversations,
        'user_id' => $user_id,
        'followings'=> $followings,
        ]);
    }

    public function show_conversation(Request $request,$id){

        $user_id = Auth::id();

        $followings = $this->follow
                            ->where('follower_id', $user_id)
                            ->with('following')
                            ->get();

        // get the conversation
        $conversation = $this->conversation
                    ->with(['messages.sender','lastMessage','user1','user2'])
                    ->findOrfail($id);

        // in case conversation is not exist
        if (!$conversation) {
        return redirect()->route('messages.show')
                        ->with('error', 'Conversation not found.');
        }
        
        // update read_at
        $conversation->messages()
            ->where('sender_id','!=', $user_id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        // get conversations list
        $conversations = $this->conversation
            ->where('user1_id', $user_id)
            ->orWhere('user2_id', $user_id)
            ->with(['user1', 'user2', 'lastMessage'])
            ->latest('updated_at')
            ->get();

        // get conversation partner
        $partner = $conversation->getPartner($user_id);

        // in case partner is not exist
        if (!$partner) {
            return redirect()->route('messages.show')
                            ->with('error', 'This conversation is no longer available.');
        }

        // judge the device
        $agent = $request->header('User-Agent');
        $isMobile = preg_match('/Mobile|Android|iPhone|iPod/', $agent);

        if ($isMobile) {
            return view('messages.chat_mobile',[
                'conversation'=>$conversation,
                'conversations'=>$conversations,
                'user_id'=>$user_id,
                'followings'=>$followings,
                'partner'=>$partner]);
        } else {
            return view('messages.message',[
            'conversation' => $conversation,
            'conversations' => $conversations,
            'user_id' => $user_id,
            'followings'=> $followings,
            'partner' => $partner]);
        }
    }

    public function destroy($id){

        $user_id = Auth::id();
        $conversation = $this->conversation->findOrFail($id);

        if(!$conversation){
            return redirect()->route('messages.show')->with('error', 'Conversation no found.');
        }

        if($conversation->user1_id != $user_id && $conversation->user2_id != $user_id){
            abort(403,'Unauthorize action.');
        }

        $conversation->delete();

        return redirect()->route('messages.show')->with('success','Conversation deleted.');
    }

    public function search(Request $request){
        
        $user_id = Auth::id();
        $keyword = $request->input('q');

        $conversations = $this->conversation
                        ->where('user1_id', $user_id)
                        ->orWhere('user2_id', $user_id)
                        ->with(['user1', 'user2', 'lastMessage'])
                        ->get();

        if ($keyword) {
            $conversations = $conversations->filter(function ($conversation) use ($user_id, $keyword) {
            $partner = $conversation->getPartner($user_id);
            return $partner && stripos($partner->name, $keyword) !== false;
            });
        }

        $conversations = $conversations->sortByDesc('updated_at');

        // in case Ajax, return context
        if ($request->ajax()) {
            return view('messages.partials.user_list_items', [
                'conversations' => $conversations,
                'user_id' => $user_id,
            ])->render();
        }

        // when first load, return entire user_list
        return view('messages.partials.user_list_items', [
            'conversations' => $conversations,
            'user_id' => $user_id,
            'is_modal' => false,
            'device' => $request->input('device', 'pc'),
        ]);
    }

    public function searchFollowings(Request $request)
    {
        $user_id = Auth::id();
        $keyword = $request->input('q');

        // to get the userID who is alreay talking
        $excludeUserIds = $this->getExcludedUserIds($user_id);

        $followingsQuery = $this->follow
            ->where('follower_id', $user_id)
            ->with('following'); 

        // exclude the users who are talking
        $followingsQuery->whereNotIn('following_id', $excludeUserIds);

        // search 
        if ($keyword) {
            $followingsQuery->whereHas('following', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        $followings = $followingsQuery->get();
        
        return view('messages.partials.follow_list_items', compact('followings'))->render();
    }

    public function refreshList(Request $request)
    {
        $user_id = Auth::id();
        $search = $request->q;

        $conversations = Conversation::where(function ($q) use ($user_id) {
                $q->where('user1_id', $user_id)
                ->orWhere('user2_id', $user_id);
            })
            ->with(['lastMessage', 'user1', 'user2'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user1', function ($sub) use ($search) {
                    $sub->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('user2', function ($sub) use ($search) {
                    $sub->where('name', 'LIKE', "%{$search}%");
                });
            })
            ->orderByDesc('updated_at')
            ->get();

        return view('messages.partials.user_list_items', compact('conversations', 'user_id'))->render();
    }

    
}