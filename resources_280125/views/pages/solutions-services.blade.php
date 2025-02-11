@extends('layouts.app')

@section("htmlheader_title", $solution_sub_categories->meta_title)

@section("htmlheader_desc", $solution_sub_categories->meta_desc)

@section("htmlheader_keyword", $solution_sub_categories->meta_keyword)

@section('content')
    
<div class="py-5 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="my-lg-4 fs-68 fw-medium lh-1 text-m-40">
                        {{$solution_sub_categories->title}}
                    </h1>
                    <p class="fs-5 grey-1 mb-4 text-m-16">
                        {{$solution_sub_categories->detail}}
                    </p>
                    <a href="{{$solution_sub_categories->banner_cta_link}}" class="btn btn-warning">{{$solution_sub_categories->banner_cta_name}}</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{url($solution_sub_categories->image)}}" class="w-100" alt="{{$solution_sub_categories->image_alt}}" title="{{$solution_sub_categories->image_title}}">
                </div>
            </div>
        </div>
    </div>
    @if(isset($solutions_category_cardcontent))
    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row gy-3">
                    <div class="col-lg-10">
                        <?php echo $solutions_category_cardcontent->details; ?>
                    </div>
                    <div class=""></div>
                    @if($solutions_category_cardcontent->card1_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card1_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card1_icon_alt}}" title="{{$solutions_category_cardcontent->card1_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card1_title}}</p>
                    </div>
                    @endif
                    @if($solutions_category_cardcontent->card2_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card2_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card2_icon_alt}}" title="{{$solutions_category_cardcontent->card2_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card2_title}}</p>
                    </div>
                    @endif
                    @if($solutions_category_cardcontent->card3_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card3_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card3_icon_alt}}" title="{{$solutions_category_cardcontent->card3_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card3_title}}</p>
                    </div>
                    @endif
                    @if($solutions_category_cardcontent->card4_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card4_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card4_icon_alt}}" title="{{$solutions_category_cardcontent->card4_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card4_title}}</p>
                    </div>
                    @endif
                    @if($solutions_category_cardcontent->card5_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card5_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card5_icon_alt}}" title="{{$solutions_category_cardcontent->card5_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card5_title}}</p>
                    </div>
                    @endif
                    @if($solutions_category_cardcontent->card6_icon !='')
                    <div class="col-lg-2 text-center col-4">
                        <img src="{{url($solutions_category_cardcontent->card6_icon)}}" class="w-75 mb-2" alt="{{$solutions_category_cardcontent->card6_icon_alt}}" title="{{$solutions_category_cardcontent->card6_icon_title}}">
                        <p class="text-m-14">{{$solutions_category_cardcontent->card6_title}}</p>
                    </div>
                    @endif
                    <div class="col-lg-10">
                        <p>{{$solutions_category_cardcontent->short_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(!$solutions_purpose_benefits->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="bg-gradiant-2 p-4 p-lg-5 rounded-5 d-flex flex-column gap-4 align-items-start w-100 ">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="badge-only mb-3">
                            <img src="{{url(optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->icon)}}" alt="" />
                            {{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->title}}
                        </div>
                        <h2 class="fs-44 fw-medium  text-m-32 mb-3">{{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->sub_title}}
                        </h2>
                            <p class="m-0 grey-1">{{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->short_detail}}</p>
                    </div>

                    <div class="col-lg-8">
                        <div class="accordion accor-des-three" id="accordionExample">
                            
                            @php
                            $i = 1;
                            @endphp
                            @foreach($solutions_purpose_benefits as $benfit)
                            <div class="inline-accor">
                                <img src="{{url($benfit->icon)}}" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse_{{$i}}" aria-expanded="true">
                                            <img src="{{url($benfit->icon)}}" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>{{$benfit->benefit_title}}</strong>
                                                <span class="first-line">{{$benfit->benefit_details}}</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapse_{{$i}}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{$benfit->benefit_details}}

                                            <ul class="list-style-3">
                                            <li>
                                                <img src="{{url($benfit->card1_icon)}}" alt="{{$benfit->card1_icon_alt}}" title="{{$benfit->card1_icon_title}}">
                                                <p>{{$benfit->card1_title}}</p>
                                            </li>
                                            @if($benfit->card2_title !='')
                                            <li>
                                                <img src="{{url($benfit->card2_icon)}}" alt="{{$benfit->card2_icon_alt}}" title="{{$benfit->card2_icon_title}}">
                                                <p>{{$benfit->card2_title}}</p>
                                            </li>
                                            @endif
                                            @if($benfit->card3_title !='')
                                            <li>
                                                <img src="{{url($benfit->card3_icon)}}" alt="{{$benfit->card3_icon_alt}}" title="{{$benfit->card3_icon_title}}">
                                                <p>{{$benfit->card3_title}}</p>
                                            </li>
                                            @endif
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                            $i++;
                            @endphp
                            @endforeach
                            <!-- <div class="inline-accor">
                                <img src="assets/images/icons/whatsapp-accor.svg" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false">
                                            <img src="assets/images/icons/whatsapp-accor.svg" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>WhatsApp Business API</strong>
                                                <span class="first-line">In a world where your customers are spread
                                                    across the globe, why limit your marketing campaigns</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        In a world where your customers are spread across the globe, why limit your
                                            marketing campaigns to small areas? TelSpiel brings you a proven way of
                                            changing the dynamics of promotional campaigns by using SMS Channel. Our
                                            promotional SMS service can help businesses connect with their prospective
                                            customers, eliminating geographical limitations with the help of scalable
                                            API and data analytics.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-accor">
                                <img src="assets/images/icons/rcs-accor.svg" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false">
                                            <img src="assets/images/icons/rcs-accor.svg" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>RCS Messaging</strong>
                                                <span class="first-line">In a world where your customers are spread
                                                    across the globe, why limit your marketing campaigns</span>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        In a world where your customers are spread across the globe, why limit your
                                            marketing campaigns to small areas? TelSpiel brings you a proven way of
                                            changing the dynamics of promotional campaigns by using SMS Channel. Our
                                            promotional SMS service can help businesses connect with their prospective
                                            customers, eliminating geographical limitations with the help of scalable
                                            API and data analytics.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inline-accor">
                                <img src="assets/images/icons/email-accor.svg" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsefour"
                                            aria-expanded="false">
                                            <img src="assets/images/icons/email-accor.svg" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>Email</strong>
                                                <span class="first-line">In a world where your customers are spread
                                                    across the globe, why limit your marketing campaigns</span>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapsefour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        In a world where your customers are spread across the globe, why limit your
                                            marketing campaigns to small areas? TelSpiel brings you a proven way of
                                            changing the dynamics of promotional campaigns by using SMS Channel. Our
                                            promotional SMS service can help businesses connect with their prospective
                                            customers, eliminating geographical limitations with the help of scalable
                                            API and data analytics.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inline-accor">
                                <img src="assets/images/icons/voice-accor.svg" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                            aria-expanded="false">
                                            <img src="assets/images/icons/voice-accor.svg" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>Voice</strong>
                                                <span class="first-line">In a world where your customers are spread
                                                    across the globe, why limit your marketing campaigns</span>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapsefive" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        In a world where your customers are spread across the globe, why limit your
                                            marketing campaigns to small areas? TelSpiel brings you a proven way of
                                            changing the dynamics of promotional campaigns by using SMS Channel. Our
                                            promotional SMS service can help businesses connect with their prospective
                                            customers, eliminating geographical limitations with the help of scalable
                                            API and data analytics.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="inline-accor">
                                <img src="assets/images/icons/ai-chat-arror.svg" class="outer-icon" alt="">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsesix"
                                            aria-expanded="false">
                                            <img src="assets/images/icons/ai-chat-arror.svg" class="inner-icon" alt="">
                                            <div class="inner-btn-con">
                                                <strong>AI-Chat Bots</strong>
                                                <span class="first-line">In a world where your customers are spread
                                                    across the globe, why limit your marketing campaigns</span>
                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapsesix" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        In a world where your customers are spread across the globe, why limit your
                                            marketing campaigns to small areas? TelSpiel brings you a proven way of
                                            changing the dynamics of promotional campaigns by using SMS Channel. Our
                                            promotional SMS service can help businesses connect with their prospective
                                            customers, eliminating geographical limitations with the help of scalable
                                            API and data analytics.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    @endif
    @if(!$success_story_casestudy->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
        <div class="">
            <div class="mb-4 ms-lg-7 px-4">
                <div class="badge-only mb-4">
                    <img src="{{url('assets/images/icons/star-yellow-icon.svg')}}" alt="" />
                   Success Stories
                </div>
                <h2 class="fs-1 fw-medium pb-3">
                    Relevant Success Stories</span>
                </h2>
            </div>

            <div class="swiper case-slider">
                <div class="swiper-wrapper">
                    @foreach($success_story_casestudy as $caseStudy)
                    <div class="swiper-slide">
                        <div class="card case-card">
                            <div class="card-body">
                                @if($caseStudy->type == 'Youtube_video')
                                <a class="popup-youtube" href="{{$caseStudy->youtube_video_link}}">
                                    <img src="{{url($caseStudy->image)}}" class="w-100" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" />
                                </a>
                                @else
                                <a href="{{url('success-story').'/'.$caseStudy->cta_url}}"><img src="{{url($caseStudy->image)}}" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" /></a>
                                @endif
                                <h6 class="fs-5 fw-bold">{{$caseStudy->title}}</h6>
                                <p>
                                    {{$caseStudy->shot_desc}}
                                </p>
                                @if($caseStudy->type == 'Youtube_video')
                                  <a href="{{$caseStudy->youtube_video_link}}" class="d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold popup-youtube">Watch
                                    <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>
                                    @else
                                  <a href="{{url('success-story').'/'.$caseStudy->cta_url}}" class="d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold">Learn More
                                    <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>

                                    @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!$solution_main_category->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
        <div class="">
            <div class="mb-4 text-center px-4">
                <div class="badge-only mb-4">
                    <img src="{{url('assets/images/icons/star-yellow-icon.svg')}}" alt="" />
                    Services
                </div>
                <h2 class="fs-1 fw-medium pb-3">
                  Explore another Purpose
                    
                </h2>
            </div>

            <div class="swiper case-slider">
                <div class="swiper-wrapper">
                    @foreach($solution_main_category as $data)
                    <div class="swiper-slide">
                        <div class="animated-list-card">
                            <a href="{{url('solutions')}}/{{$slug}}/{{strtolower($data->slug)}}"><img src="{{url($data->image)}}" class="w-100 card-img"
                                alt="{{$data->image_alt}}" title="{{$data->image_title}}" /></a>
                            <h6 class="fs-20 fw-bold">{{$data->title}}</h6>
                            <p>{{$data->detail}}
                            </p>
                            <a href="{{url('solutions')}}/{{$slug}}/{{strtolower($data->slug)}}"
                                class="d-flex align-items-center gap-2  grey-1 fw-semibold">{{$data->link_name}}
                                <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>
                        </div>
                    </div>
                    @endforeach

                   
               
                </div>
            </div>
        </div>
    </section>
    @endif

    
@endsection



@section('script_content')
<script>
  $('.sectionUl').find('ul').addClass('list-check mt-3');
</script>

<script>
        $(document).ready(function() {
            // Change tab based on dropdown selection
            $('.dropdown-item').click(function(e) {
                e.preventDefault();
                var selectedTab = $(this).attr('href');
                $('.nav-link[href="' + selectedTab + '"]').tab('show');
                $('#mobileDropdown').text($(this).text()); // Update dropdown button text
            });

            // Change dropdown selection based on active tab
            $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
                var activeTab = $(e.target).attr('href');
                var activeText = $(e.target).text();
                $('#mobileDropdown').text(activeText); // Update dropdown button text
            });
        });
    </script>

@endsection
