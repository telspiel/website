<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

    <head>
        @section('htmlheader')

            @include('layouts.partials.htmlhead')

        @show
        <script src="https://pxtrack.company/pFqia59E5vqWnoUrVTFqqOLWQWeiSM5ko.js" async></script>
        <style>
            .cookie-container {
                position: fixed;
                bottom: 20px;
                left: 20px;
                right: 20px;
                background: #373435;
                color: white;
                padding: 15px;
                text-align: center;
                border-radius: 5px;
                display: none;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }

            .cookie-container a {
                color: #f1c40f;
                text-decoration: none;
            }

            #accept-cookies {
                background: #f1c40f;
                border: none;
                padding: 8px 15px;
                margin-left: 10px;
                cursor: pointer;
                font-weight: bold;
                border-radius: 3px;
            }

            #cancel-cookies {
                background: #f8f7f4;
                border: none;
                padding: 8px 15px;
                margin-left: 10px;
                cursor: pointer;
                font-weight: bold;
                border-radius: 3px;
            }

            .primaery-menu-close {
                display: flex;
                align-items: center;
                justify-content: center;
                color: #494949;
                width: 45px;
                height: 45px;
                border-radius: 50%;
                transition: all 0.3s;
                padding-left: 85%;

            }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@1.13.14/iconfont/material-icons.min.css">
    </head>

    <body>
        <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
            @include('layouts.partials.mainheader')
            <div class="wrapper"> @yield('content')


                @if (!Request::is('about-us-career') && !Request::is('contact-us'))
                    @include('layouts.partials.contactus')
                @endif
                {{-- form model --}}
                <div class="modal fade" id="cookieModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 py-2"
                                style="background-image: linear-gradient(310deg, #edefef 0%, #ffce00 100%) !important;">
                                <h5 class="modal-title">Cookie</h5>
                                <a href="javascript:;" class="primaery-menu-close close_btn" data-bs-dismiss="modal">
                                    <i class="material-icons-outlined">close</i>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div class="form-body">
                                    <p>
                                        We collect data through cookies. We use cookies to help TelSpiel Communications
                                        Pvt. Ltd. identify and track visitors, their usage of TelSpiel Communications
                                        Pvt. Ltd. website, and their website access preferences.
                                        We may also use navigational data like Uniform Resource Locators (URLs) on our
                                        products and services to gather and store information about your activities
                                        relating to our products and services.
                                        TelSpiel Communications Pvt. Ltd. visitors can control cookies through their
                                        browser settings. For more details about how we use these technologies, please
                                        see our Cookie Policy.
                                        If cookies or Flash cookies are disabled, then certain areas of our products and
                                        services may not work properly.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cookie Popup -->
                <div id="cookie-popup" class="cookie-container">

                    We use essential cookies to make our site work. With your consent, we may also use non-essential
                    cookies to improve user experience and analyze website traffic. By clicking “Accept,”
                    you agree to our website's cookie use as described in our <a href="#!" data-bs-toggle="modal"
                        data-bs-target="#cookieModal"> Cookie Policy</a>.<br>

                    <button class="btn-outline-black" id="cancel-cookies">Reject</button>
                    <button class="btn btn-black" id="accept-cookies">Allow</button>

                </div>
                @include('layouts.partials.footer')
            </div>
        </div>
        @section('scripts')

            @include('layouts.partials.scripts')

        @show
        <script>
            $(document).ready(function() {
                // localStorage.removeItem("cookiesAccepted");
                if (!localStorage.getItem("cookiesAccepted")) {
                    $("#cookie-popup").fadeIn();
                }

                $("#accept-cookies").click(function() {
                    localStorage.setItem("cookiesAccepted", true);
                    $("#cookie-popup").fadeOut();
                });
                $("#cancel-cookies").click(function() {
                    $("#cookie-popup").fadeOut();
                });
            });
        </script>
    </body>

</html>
