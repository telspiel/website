<!doctype html>
<html lang="en" data-bs-theme="light">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Telspiel</title>
        <!--favicon-->
        <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/png">
        <!-- loader-->
        <link href="{{ asset('website/assets/css/pace.min.css') }}" rel="stylesheet">
        <script src="{{ asset('website/assets/js/pace.min.js') }}"></script>

        <!--plugins-->
        <link href="{{ asset('website/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link rel="{{ asset('website/stylesheet" type="text/css" href="assets/plugins/metismenu/metisMenu.min.css') }}">
        <link rel="{{ asset('website/stylesheet" type="text/css" href="assets/plugins/metismenu/mm-vertical.css') }}">
        <!--bootstrap css-->
        <link href="{{ asset('website/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link
            href="{{ asset('website/https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap') }}"
            rel="stylesheet">
        <link href="{{ asset('website/https://fonts.googleapis.com/css?family=Material+Icons+Outlined') }}"
            rel="stylesheet">
        <!--main css-->
        <link href="{{ asset('website/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
        <link href="{{ asset('website/sass/main.css') }}" rel="stylesheet">
        <link href="{{ asset('website/sass/dark-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('website/sass/blue-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('website/sass/responsive.css') }}" rel="stylesheet">

    </head>

    <body>


        <!--authentication-->

        <div class="section-authentication-cover">
            <div class="">
                <div class="row g-0">

                    <div
                        class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">

                        <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
                            <div class="card-body">
                                <img src="{{ asset('website/assets/images/gallery/welcome-back-3.png') }}"
                                    class="img-fluid auth-img-cover-login" width="650" alt="">
                            </div>
                        </div>

                    </div>

                    <div
                        class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
                        <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
                            <div class="card-body p-sm-5">
                                <img src="{{ asset('website/assets/images/Tespiel_Logo.png') }}" class="mb-4"
                                    width="145" height="100%" alt="">
                                {{-- <img src="{{ asset('assets/images/logo1.png')}}" class="mb-4" width="145" alt=""> --}}
                                {{-- <h4 class="fw-bold">Get Started Now</h4> --}}

                                <div class="form-body mt-4">
                                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmailAddress"
                                                name="email" placeholder="Enter Email">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control" id="inputChoosePassword"
                                                    name="password" value="" placeholder="Enter Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class="bi bi-eye-slash-fill"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn"
                                                    style="background-image: linear-gradient(310deg, #ffcb00, #ffcb00b8) !important;}">Login</button>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="text-start">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="auth-cover-register.html">Sign up here</a>
                                                </p>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </div>

        <!--authentication-->




        <!--plugins-->
        <script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $("#show_hide_password a").on('click', function(event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("bi-eye-slash-fill");
                        $('#show_hide_password i').removeClass("bi-eye-fill");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                        $('#show_hide_password i').addClass("bi-eye-fill");
                    }
                });
            });
        </script>

    </body>

</html>
