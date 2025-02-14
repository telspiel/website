@extends('admin.layout.main')
@section('title')
    | User Enquiry Profile
@endsection
@section('content')
    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">User Enquiry Profile</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="card rounded-4">
                <div class="card-body p-4">
                    <div class="position-relative mb-5">
                        <img src="{{ asset('website/assets/images/gallery/profile-cover.png') }}"
                            class="img-fluid rounded-4 shadow" alt="">
                        <div class="profile-avatar position-absolute top-100 start-50 translate-middle">
                            <img src="{{ asset('website/assets/images/avatars/01.png') }}"
                                class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170"
                                alt="">
                        </div>
                    </div>
                    <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3>{{ $data->name }}</h3>
                            <p class="mb-0">{{ $data->phone }}<br>
                                {{ $data->email }}</p>
                        </div>
                        <div class="">
                            <a href="javascript:;" class="btn rounded-5 px-4"
                                style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;
}"><i
                                    class="bi bi-chat me-2"></i>Send Message</a>
                        </div>
                    </div>
                    <div class="kewords d-flex align-items-center gap-3 mt-4 overflow-x-auto">
                        <button type="button" class="btn btn-sm btn-light rounded-5 px-4">Job Title: @isset($data->title) {{ $data->title->job_title }} @endisset</button>
                        <button type="button" class="btn btn-sm btn-light rounded-5 px-4">Job Location: @isset($data->location) {{ $data->location->location }} @endisset</button>
                        <button type="button" class="btn btn-sm btn-light rounded-5 px-4">Company
                            Name:{{ $data->company }}</button>
                    </div>
                    <div class="kewords d-flex align-items-center gap-3 mt-4 overflow-x-auto">
                        <h6>Message: </h6>
                        <p class="mb-0">{{ $data->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
