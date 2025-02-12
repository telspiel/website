@extends('admin.layout.main')
@section('title')
    | User Profile
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
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                            <img src="{{ asset('assets/images/icon.png') }}"
                                class="img-fluid rounded-circle p-1 bg-grd-danger shadow" width="170" height="170"
                                alt="">
                        </div>
                    </div>
                    <div class="profile-info pt-5 d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3>{{ Auth::user()->name }}</h3>
                            <p class="mb-0">808, Bhutani Office Tower<br>
                                Noida, UP</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card rounded-4 border-top border-4 border-primary border-gradient-1">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">Edit Profile</h5>
                                </div>

                            </div>
                            <form class="row g-4" action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name"
                                        value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="text" class="form-control" id="old_password" name="old_password"
                                        value="{{ old('old_password') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        value="{{ old('password') }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="text" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value="{{ old('password_confirmation') }}">
                                </div>
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-grd-primary px-4"
                                            style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;
}">Update
                                            Profile</button>
                                        <button type="button" class="btn btn-light px-4">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">About</h5>
                                </div>

                            </div>
                            <div class="full-info">
                                <div class="info-list d-flex flex-column gap-3">
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">account_circle</span>
                                        <p class="mb-0">Full Name: {{ Auth::user()->name }}</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">done</span>
                                        <p class="mb-0">Status: active</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">code</span>
                                        <p class="mb-0">Role: Admin</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">flag</span>
                                        <p class="mb-0">Country: India</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">language</span>
                                        <p class="mb-0">Language: English</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">send</span>
                                        <p class="mb-0">Email: marketing@telSpiel.com</p>
                                    </div>
                                    <div class="info-list-item d-flex align-items-center gap-3"><span
                                            class="material-icons-outlined">call</span>
                                        <p class="mb-0">Phone: +91-120-4108800</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-4">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0 fw-bold">Accounts</h5>
                                </div>

                            </div>

                            <div class="account-list d-flex flex-column gap-4">
                                <div class="account-list-item d-flex align-items-center gap-3">
                                    <img src="{{ asset('website/assets/images/apps/05.png') }}" width="35"
                                        alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Google</h6>
                                        <p class="mb-0">Events and Reserch</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>
                                <div class="account-list-item d-flex align-items-center gap-3">
                                    <img src="{{ asset('website/assets/images/apps/06.png') }}" width="35"
                                        alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Instagram</h6>
                                        <p class="mb-0">Social Network</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>
                                <div class="account-list-item d-flex align-items-center gap-3">
                                    <img src="{{ asset('website/assets/images/apps/17.png') }}" width="35"
                                        alt="">
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Facebook</h6>
                                        <p class="mb-0">Social Network</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" checked>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div><!--end row-->



        </div>
    </main>
    <!--end main wrapper-->
@endsection
