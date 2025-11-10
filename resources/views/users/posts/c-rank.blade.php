@extends('layouts.app')

@section('title', 'Category Ranking')

@section('content')
<div class="container-fluid p-0 mt-0">
    <div class="row   align-items-center justify-content-center text-center mb-5 " style="
    background-image: url('{{ asset('images/tokyo.jpeg') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 300px;
    position: relative;
    ">
        <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 1;
        "></div>
        <h1 class="display-1 fw-bold text-white" style="z-index: 2; position: relative;">TOKYO</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-4 d-flex justify-content-center">
            <div class="card border-0 shadow-sm w-100">
                <div class="card-body p-0">
                    <img src="{{ asset('images/たぬきち.png') }}" alt="たぬきち" class="d-block w-100 h-100" style="object-fit: cover; border-radius:10px;">
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fs-5 mb-0"> Title</span>
                        <div class="d-flex align-items-center gap-2">
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-heart me-1"  style="color: #9F6B46"></i>
                                    <span>123</span>
                                </button>
                            </form>
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-star me-1"  style="color: #9F6B46"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small mb-0">Date</span>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge border" style="color: #9F6B46; background-color: rgb(236, 239, 255)">Category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 d-flex justify-content-center">
            <div class="card border-0 shadow-sm w-100">
                <div class="card-body p-0">
                    <img src="{{ asset('images/たぬきち.png') }}" alt="たぬきち" class="d-block w-100 h-100" style="object-fit: cover; border-radius:10px;">
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fs-5 mb-0"> Title</span>
                        <div class="d-flex align-items-center gap-2">
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-heart me-1"  style="color: #9F6B46"></i>
                                    <span>123</span>
                                </button>
                            </form>
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-star me-1"  style="color: #9F6B46"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small mb-0">Date</span>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge border" style="color: #9F6B46; background-color: rgb(236, 239, 255)">category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 d-flex justify-content-center">
            <div class="card border-0 shadow-sm w-100">
                <div class="card-body p-0">
                    <img src="{{asset('images/たぬきち.png')}}" alt="たぬきち" class="d-block w-100 h-100" style="object-fit: cover; border-radius:10px;">
                </div>
                <div class="card-footer bg-white border-0">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fs-5 mb-0"> Title</span>
                        <div class="d-flex align-items-center gap-2">
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-heart me-1"  style="color: #9F6B46"></i>
                                    <span>123</span>
                                </button>
                            </form>
                            <form action="#" method="post" >
                                <button type="submit" class="btn btn-sm p-0">
                                    <i class="fa-solid fa-star me-1"  style="color: #9F6B46"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="small mb-0">Date</span>
                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge border" style="color: #9F6B46; background-color: rgb(236, 239, 255)">Category</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection