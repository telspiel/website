@extends('layouts.app')

@section("htmlheader_title", optional(\App\Models\HomePageMeta::first())->meta_title)

@section("htmlheader_desc", optional(\App\Models\HomePageMeta::first())->meta_desc)

@section("htmlheader_keyword", optional(\App\Models\HomePageMeta::first())->meta_keyword)

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    
    @if(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->id)
    <section class="section-spacing">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6 text-center">
                        <img class="imgAnimation aos-init aos-animate" data-aos="fade-right" src="{{url(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->image)}}" alt="{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->image_alt}}" title="{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->image_title}}" />
                    </div>
                    <div class="col-lg-6">
                        <div class="badge-only mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
                            <img src="{{asset('assets/images/icons/appas-yellow-icon.svg')}}" alt="" />
                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->short_title}}
                        </div>
                        <h2 class="fs-44 fw-medium lh-1 text-m-32 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->title}}
                        </h2>
                        <p class="mb-4 mt-3 text-secondary-60 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" >
                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->sub_text}}
                        </p>
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-start gap-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon_about">
                                <img src="{{url(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature1_icon)}}" alt="" />
                                   
                                </div>  
                                <div class="">
                                        <h3 class="fs-6">{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature1}}</h3>
                                        <p class="fs-14 text-secondary-60">
                                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature1_desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-start gap-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon_about">
                                <img src="{{url(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature2_icon)}}" alt="" />
</div>
                                <div class="">
                                        <h3 class="fs-6">{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature2}}</h3>
                                        <p class="fs-14 text-secondary-60">
                                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature2_desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-start gap-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon_about">
                                <img src="{{url(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature3_icon)}}" alt="" />
</div>
                                <div class="">
                                        <h3 class="fs-6">{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature3}}</h3>
                                        <p class="fs-14 text-secondary-60">
                                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature3_desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-start gap-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon_about"> 
                                <img src="{{url(optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature4_icon)}}" alt="" />
</div>
                                <div class="">
                                        <h3 class="fs-6">{{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature4}}</h3>
                                        <p class="fs-14 text-secondary-60">
                                            {{optional(\App\Models\HomePageAboutUs::where('status','Enable')->first())->feature4_desc}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endif
    @if(!$Clients->isEmpty())
    <section class="section-spacing">
        <h2 class="text-center fs-1 fw-medium lh-1 mb-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            Brands that trust telSpiel
        </h2>
        <!-- <div class="brands-slider speed-test" data-speed="60">
           
                @foreach($Clients as $clint)
                <div class="brands-logo">
                    <img src="{{url($clint->logo)}}" alt="{{$clint->client_name}}" title="{{$clint->title}}" />
                </div>
                @endforeach
            
        </div> -->
        <div class="swiper brandsLogo-slider">
        <div class="swiper-wrapper">
        @foreach($Clients as $clint)
        <div class="swiper-slide">
                <div class="brands-logo">
                    <img src="{{url($clint->logo)}}"  alt="{{$clint->client_name}}" title="{{$clint->title}}" />
                </div>
        </div>
                @endforeach
        </div>
</div>
    </section>
    @endif
    @if(optional(\App\Models\HomePageOurExperties::first())->id)
    <section class="section-spacing pinit ">
        <div class="container ">
            <div class="reduce-90px-width">
                <div class="card bg-secondary rounded-5 rounded-m-24 p-lg-5 p-1 ">
                    <div class="card-body">
                        <div class="row gy-5 ">
                            <div class="col-lg-6 ">
                                <div class="badge-only bg-transparent text-white">
                                    <img src="{{url('assets/images/icons/square-yellow-icon.svg')}}" alt="" />
                                    {{optional(\App\Models\HomePageOurExperties::first())->short_title}}
                                </div>

                                <h3 class="text-white fs-1 my-4">{{optional(\App\Models\HomePageOurExperties::first())->title}}</h3>
                                <p class="text-white opacity-60 my-4">
                                    {{optional(\App\Models\HomePageOurExperties::first())->detail}}
                                </p>
                                <a href="{{optional(\App\Models\HomePageOurExperties::first())->url}}" class="btn btn-warning mt-2">{{optional(\App\Models\HomePageOurExperties::first())->cta_link}}</a>
                            </div>

                            <div class="col-lg-6">
                                <ul class="animated-cards">
                                    @if(!$solution_sub_categories->isEmpty())
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($solution_sub_categories as $solution)
                                    <li class="incard-{{$i++}}">
                                        <img src="{{url($solution->icon)}}" alt="{{$solution->image_alt}}" title="{{$solution->image_title}}" />
                                        <div class="">
                                            <a href="/solutions"><h5>{{$solution->title}}</h5>
                                            <p>
                                                {{$solution->detail}}
                                            </p></a>
											</div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    @endif
    @if(optional(\App\Models\HomePageIntegration::first())->id)
    <section class="section-spacing">
        <div class="container">
            <div class="reduce-90px-width">
            <div class="row align-items-center gy-5">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="badge-only mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
                        <img src="{{asset('assets/images/icons/secure-yellow-icon.svg')}}" alt="" />
                        {{optional(\App\Models\HomePageIntegration::first())->short_title}}
                    </div>
                    <h2 class="fs-1 fw-medium lh-1 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        {{optional(\App\Models\HomePageIntegration::first())->title}}
                    </h2>
                    <p class="my-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                        {{optional(\App\Models\HomePageIntegration::first())->detail}}
                    </p>
                    <a href="{{optional(\App\Models\HomePageIntegration::first())->url}}" class="btn btn-warning aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">{{optional(\App\Models\HomePageIntegration::first())->cta_link}}</a>
                </div>
                <div class="col-lg-6 text-center order-1 order-lg-2" style="overflow: hidden;">
                    <img class="aos-init aos-animate" data-aos="fade-left" data-aos-delay="100"  src="{{url(optional(\App\Models\HomePageIntegration::first())->image)}}" alt="{{optional(\App\Models\HomePageIntegration::first())->image_alt}}" title="{{optional(\App\Models\HomePageIntegration::first())->image_title}}" />
                </div>
            </div>
            </div>
           
        </div>
    </section>
    @endif

    <section class="section-spacing d-none">
        <div class="centeredbg">
            <div class="container text-center mb-4">
                <div class="badge-only mb-4">
                    <img src="assets/images/icons/heart-yellow-icon.svg" alt="" />
                    Testimonials
                </div>
                <h2 class="fs-1 fw-medium pb-3 px-4 text-m-32">What they say about us</h2>
            </div>

            <div class="swiper testimonial-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="card testi-card">
                            <div class="card-body">
                                <img src="assets/images/testmonial-thumb.png" class="w-100" alt="" />
                                <h6 class="fs-5 fw-bold mb-3">
                                    “Before telSpiel, our team was juggling multiple tools and
                                    platforms.”
                                </h6>
                                <div class="author">Jordan R.</div>
                                <div class="company">Project Manager, XYZ Co. LTD.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(optional(\App\Models\HomePageCaseStudy::first())->id)
    <section class="section-spacing">
        <div class="">
            <div class="mb-4 ms-lg-7 px-4">
                <div class="badge-only mb-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('assets/images/icons/star-yellow-icon.svg')}}" alt="" />
                    {{optional(\App\Models\HomePageCaseStudy::first())->title}}
                </div>
                <h2 class="fs-1 fw-medium pb-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <?php echo optional(\App\Models\HomePageCaseStudy::first())->heading; ?>
                </h2>
            </div>

            <div class="swiper case-slider">
                <div class="swiper-wrapper">
                    @if(!$success_storypage_casestudy->isEmpty())
                    @foreach($success_storypage_casestudy as $caseStudy)
                    <div class="swiper-slide">
                        <div class="card case-card">
                            <div class="card-body">
                                @if($caseStudy->type == 'Youtube_video')
                                <a class="popup-youtube" href="{{$caseStudy->youtube_video_link}}">
                                    <img src="{{url($caseStudy->image)}}" class="w-100" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" />
                                </a>
                                @else
                                <a href="{{url('success-story').'/'.$caseStudy->cta_url}}"><img src="{{url($caseStudy->image)}}" class="w-100" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" /></a>
                                @endif
                                <h6 class="fs-5 fw-bold aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"><a href="{{url('success-story').'/'.$caseStudy->cta_url}}" class="grey-heading">{{$caseStudy->title}}</a></h6>
                                <p class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                                    {{$caseStudy->shot_desc}}
                                </p>

                                @if($caseStudy->type == 'Youtube_video')
                                  <a href="{{$caseStudy->youtube_video_link}}" data-aos="fade-up" data-aos-delay="150" class="text-hover-img aos-init aos-animate d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold popup-youtube">Watch
                                    <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>
                                    @else
                                  <a href="{{url('success-story').'/'.$caseStudy->cta_url}}" data-aos="fade-up" data-aos-delay="150" class="text-hover-img aos-init aos-animate d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold translate">Learn More
                                    <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>

                                    @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
    
    @endsection



@section('script_content')

<script>
    gsap.timeline({
            scrollTrigger: {
                trigger: ".pinit",
                start: "center center",
                end: "bottom top",
                ///markers: true,
                scrub: true,
                pin: true,
                delay: 4
            }
        })

        .from(".incard-2", {
            y: 100 * 1,
            opacity: 0
        })
        .from(".incard-3", {
            y: 100 * 1,
            opacity: 0
        })
        .from(".incard-4", {
            y: 100 * 1,
            opacity: 0
        })
        .from(".incard-5", {
            y: 100 * 1,
            opacity: 0
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <script>
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
        type: 'iframe'
      });
    });
		  var verswiper = new Swiper('.verslider', {
    slidesPerView: 1,
    direction: 'vertical',     
    
    loop:true,
    
    autoplay: {
      delay: 2000,
      reverseDirection: true,
      disableOnInteraction: false,
  },
  });
    </script>

@endsection
