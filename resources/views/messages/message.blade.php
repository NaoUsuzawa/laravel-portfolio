@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        {{-- pc user-list --}}
        <div class="col-4 d-none d-md-block">
            @include('messages.partials.user-list')
        </div>

        {{-- mobile user-list --}}
        <div class="col-12 d-md-none">
            @include('messages.partials.user-list')
        </div>

        {{-- pc chat-board --}}
        <div class="col-8 d-none d-md-block">
            @include('messages.partials.chat')
        </div>
    </div>
</div>

<!-- Follow List Modal -->
<div class="modal fade" id="followListModal" tabindex="-1" aria-labelledby="followListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="followListModalLabel">Select User to Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="" method="">
                    <div class="d-flex mb-3 mt-2 align-items-center" style="width: 100%">
                        <div class="d-flex flex-grow-1">
                            <input type="text" name="" id="" class="form-control me-4" placeholder="Search User...">
                        </div>
                        <div class="d-flex ms-auto">
                            <button class="btn custom-btn"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                        </div>
                    </div>
                </form>

                <div class="user-list-scroll mt-3">
                    <div class="d-flex align-items-center rounded-3 p-3">
                        <img src="https://images.pexels.com/photos/33189108/pexels-photo-33189108.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:65px; height:65px;">

                        <div class="d-flex align-items-center justify-content-center">
                            <h6 class="mb-0 fw-bold" style="">USER A</h6>
                        </div>

                        <div class="d-flex align-items-center ms-auto">
                            <button class="btn btn-outline"><i class="fa-regular fa-envelope"></i>&nbsp;Message</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center rounded-3 p-3">
                        <img src="https://images.pexels.com/photos/33189108/pexels-photo-33189108.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:65px; height:65px;">

                        <div class="d-flex align-items-center justify-content-center">
                            <h6 class="mb-0 fw-bold" style="">USER B</h6>
                        </div>

                        <div class="d-flex align-items-center ms-auto">
                            <button class="btn btn-outline"><i class="fa-regular fa-envelope"></i>&nbsp;Message</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center rounded-3 p-3">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:65px; height:65px;">

                        <div class="d-flex align-items-center justify-content-center">
                            <h6 class="mb-0 fw-bold" style="">USER C</h6>
                        </div>

                        <div class="d-flex align-items-center ms-auto">
                            <button class="btn btn-outline"><i class="fa-regular fa-envelope"></i>&nbsp;Message</button>
                        </div>
                    </div>

                    <div class="d-flex align-items-center rounded-3 p-3">
                        <img src="https://images.pexels.com/photos/415829/pexels-photo-415829.jpeg" alt="user" class="rounded-circle me-4 align-items-ceter" style="width:65px; height:65px;">

                        <div class="d-flex align-items-center justify-content-center">
                            <h6 class="mb-0 fw-bold" style="">USER D</h6>
                        </div>

                        <div class="d-flex align-items-center ms-auto">
                            <button class="btn btn-outline"><i class="fa-regular fa-envelope"></i>&nbsp;Message</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
