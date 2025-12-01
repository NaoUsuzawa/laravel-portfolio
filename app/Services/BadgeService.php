<?php

namespace App\Services;

use App\Models\Badge;
use App\Models\User;

class BadgeService
{
    /**
     * ユーザーが獲得できるバッジをチェックして付与する
     * 付与したバッジを配列で返す
     */
    public function checkAndGiveBadges(User $user): array
    {
        $awarded = [];

        // 1. 初投稿バッジ
        if ($user->posts()->count() === 1) { // この時点で初投稿なら
            $badge = $this->award($user, 'Cherry Blossom');
            if ($badge) {
                $awarded[] = $badge;
            }
        }

        // 2. 都道府県バッジ
        $prefectureCount = $user->posts()->pluck('prefecture_id')->unique()->count();

        $prefectureBadges = [
            3 => 'Karesansui',
            5 => 'Sumo',
            10 => 'Onsen hot spring',
            15 => 'Japanese Castle',
            20 => 'Lucky Cat ',
            30 => 'Ninja',
            40 => 'Maiko-san',
            47 => 'Mt.Fuji',
        ];

        if (isset($prefectureBadges[$prefectureCount])) {
            $badge = $this->award($user, $prefectureBadges[$prefectureCount]);
            if ($badge) {
                $awarded[] = $badge;
            }
        }

        return $awarded;
    }

    /**
     * バッジをユーザーに付与（未付与なら）
     */
    public function award(User $user, string $badgeKey)
    {
        $badge = Badge::where('key', $badgeKey)->first();

        if (! $badge) {
            return null;
        }

        // すでに付与済みか確認
        if ($user->badges()->where('badge_id', $badge->id)->exists()) {
            return null;
        }

        // バッジ付与
        $user->badges()->attach($badge->id, ['awarded_at' => now()]);

        return $badge;
    }
}
