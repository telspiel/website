<ul class="right-fixed-btns d-none d-lg-block">
  <li><a href="/solutions" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Features"><img src="{{asset('assets/images/icons/slider-icon.svg')}}" alt=""></a></li>
  <li><a href="/integrations" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Documentation"><img src="{{asset('assets/images/icons/twoline-icon.svg')}}" alt=""></a></li>
  <li><a href="/contact-us" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Support"><img src="{{asset('assets/images/icons/chat-icon.svg')}}" alt=""></a></li>
</ul>
@php
$headerMenu = DB::table('header_menus')
                ->select('header_menus.*')
                ->where('status','Enable')
                ->orderBy('position','ASC')
                ->get();

@endphp
                <div class="offcanvas offcanvas-start" tabindex="-1" id="sidemenu">
  <div class="offcanvas-header px-4">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img src="assets/images/logo-dark.png" width="120"
                alt=""></h5>
                    <a href="{{optional(\App\Models\Header::first())->get_in_touch_cta_link}}" class="btn btn-warning ms-auto pm-8-12">{{optional(\App\Models\Header::first())->get_in_touch_cta_name}}</a>
                    <button type="button" class="btn-close mx-3 ps-0" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
  <div class="offcanvas-body"> @if(!$headerMenu->isEmpty())
                    <div class="menu text-center ">
      <ul class="flex-column d-flex gap-4 mt-4 text-secondary">
                        @foreach($headerMenu as $menu)
                        <li> <a href="{{url($menu->menu_slug)}}">{{$menu->menu_name}}</a> </li>
                        @endforeach
		   <li> <a class="btn btn-warning ms-auto pm-8-12" href="https://habitic.io/login" target="_blank">Sign In</a> </li>
                      </ul>
						
    </div>
                    @endif </div>
</div>
@if (!in_array(url()->current(), [url('/'), url('/index'), url('/home')]))
<section class="hero-section borderbottom">
  <div class="video-background  h-auto">
    <div class="content bg-gradiant-1">
      <header class="inner-header">
        <div class="container">
          <div class="d-flex align-items-center gap-2"> <a href="{{url(optional(\App\Models\Header::first())->logo_cta_link)}}" class="logo me-auto"> <img src="{{url(optional(\App\Models\Header::first())->logo)}}" class="img-fluid" alt="{{optional(\App\Models\Header::first())->logo_alt}}" title="{{optional(\App\Models\Header::first())->logo_title}}" /> </a> @if(!$headerMenu->isEmpty())
            <div class="menu me-lg-5 menu-dark">
              <ul>
                @foreach($headerMenu as $menu)
                <li> <a href="{{url($menu->menu_slug)}}">{{$menu->menu_name}}</a> </li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="ms-lg-4 ms-auto">
              <button class="btn btn-light d-none d-xl-inline" onclick="parent.open('https://habitic.io/login')">{{optional(\App\Models\Header::first())->sign_in_cta_name}}</button>
              <a href="{{url(optional(\App\Models\Header::first())->get_in_touch_cta_link)}}" class="btn btn-warning ms-lg-3 pm-8-12">{{optional(\App\Models\Header::first())->get_in_touch_cta_name}}</a>
              <button class="btn d-xl-none ms-3 px-0" data-bs-toggle="offcanvas"
                                    data-bs-target="#sidemenu">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20">
                <path id="Icon_feather-menu" data-name="Icon feather-menu"
                                            d="M4.5,18H18.817M4.5,9h20M4.5,27h20" transform="translate(-3.5 -8)"
                                            fill="none" stroke="#101828" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" />
              </svg>
              </button>
            </div>
          </div>
        </div>
      </header>
    </div>
  </div>
</section>
@else
<section class="hero-section">
  <div class="video-background">
    <video autoplay muted loop class="video-bg">
      <source src="{{url($getBanner->video)}}" type="video/mp4" />
      Your browser does not support the video tag. </video>
    <div class="content">
      <header>
        <div class="container">
          <div class="d-flex align-items-center gap-2">
            <div class="logo me-auto"> <img src="{{url(optional(\App\Models\Header::first())->home_page_logo)}}" class="img-fluid" alt="{{optional(\App\Models\Header::first())->logo_alt}}" title="{{optional(\App\Models\Header::first())->logo_title}}" /> </div>
            @if(!$headerMenu->isEmpty())
            <div class="menu me-lg-5">
              <ul>
                @foreach($headerMenu as $menu)
                <li> <a href="{{url($menu->menu_slug)}}">{{$menu->menu_name}}</a> </li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="ms-lg-4 ms-auto">
              <button class="btn btn-light d-none d-xl-inline" onClick="parent.open('https://habitic.io/login')">{{optional(\App\Models\Header::first())->sign_in_cta_name}}</button>
              <a href="{{url(optional(\App\Models\Header::first())->get_in_touch_cta_link)}}" class="btn btn-warning ms-lg-3 pm-8-12">{{optional(\App\Models\Header::first())->get_in_touch_cta_name}}</a>
              <button class="btn d-xl-none pm-8-12" data-bs-toggle="offcanvas"
                                    data-bs-target="#sidemenu">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20">
                <path id="Icon_feather-menu" data-name="Icon feather-menu"
                                            d="M4.5,18H18.817M4.5,9h20M4.5,27h20" transform="translate(-3.5 -8)"
                                            fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" />
              </svg>
              </button>
            </div>
          </div>
        </div>
      </header>
      <!--      <div class="section-spacing">
        <div class="container">
          <div class="row">
            <div class="col-lg-8"> <span class="badge-only mb-2"><img src="{{asset('assets/images/icons/trofy-yellow.svg')}}" alt=""
                                        srcset="" /> {{$getBanner->icon_text}}</span>
              <h1 class="text-white my-2 my-lg-4 fs-68 fw-medium lh-1 text-m-40"> {{$getBanner->sub_text}} </h1>
              <p class="fs-20 grey-1 mb-lg-4 mb-2"> {{$getBanner->text}} </p>
              <a href="{{$getBanner->cta_link}}" class="btn btn-warning">{{$getBanner->cta_name}}</a> </div>
          </div>
        </div>
      </div>-->
      
      <div class="section-spacing">
        <div class="container">
          <div class="row">
            <div class="col-lg-8"> <span class="badge-only mb-2 aos-init" data-aos="fade-right"><a href="https://www.redherring.com/events/red-herring-global/2022-red-herring-top-100-global-winners/" class="grey-1" target="_blank"><img src="{{asset('assets/images/icons/trofy-yellow.svg')}}" alt=""
                                        srcset="" /> {{$getBanner->icon_text}}</a></span>
              <h1 class="text-white my-2 my-lg-4 fs-68 fw-medium lh-1 text-m-40 text-capitalize aos-init" data-aos="fade-right"> Transform customer interactions with our    
              <span class="text-white d-lg-block typewrite" data-period="1000"
              data-type='["Secure Platform", "Reliable Platform", "Stable Platform"]'>
              Secure Platform </span>
              </h1>
              <p class="fs-20 grey-1 mb-lg-4 mb-2 aos-init" data-aos="fade-right"> Connect, collaborate and innovate with our advanced communication platform, designed to empower both consumers and brands for seamless and impactful interactions. </p>
              <a href="{{$getBanner->cta_link}}" class="btn btn-warning aos-init" data-aos="fade-right">{{$getBanner->cta_name}}</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif 