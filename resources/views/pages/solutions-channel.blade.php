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
    @if(!$solutions_channel_benefits->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row justify-content-center gx-5">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="badge-only mb-4">
                                <img src="{{url(optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->icon)}}" alt="" />
                                {{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->title}}
                            </div>
                            <h3 class="fs-44 fw-medium text-m-32">{{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->sub_title}}</h3>
                            <p>{{optional(\App\Models\SolutionBenifitHeading::where('solution_id',$main_cat)->first())->short_detail}}</p>
                        </div>
                    </div>
                    
                    <div class="col-xxl-3 col-xl-4 z-1">
                        <div class="nav flex-column nav-pills mynav d-none d-xl-flex" id="v-pills-tab">
                            @foreach($solutions_channel_benefits as $benefit)
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill" href="#benefitTab_{{$benefit->id}}">{{$benefit->benefit_title}}</a>
                            @endforeach

                        </div>


                        <div class="dropdown d-block d-xl-none navmenu2drop mb-4">
                            @foreach($solutions_channel_benefits as $benefit)
                            @if($loop->first)
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="mobileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$benefit->benefit_title}}
                            </button>
                            @endif
                            @endforeach
                            <ul class="dropdown-menu" aria-labelledby="mobileDropdown">
                                @foreach($solutions_channel_benefits as $benefit)
                                <li><a class="dropdown-item" href="#benefitTab_{{$benefit->id}}">{{$benefit->benefit_title}}</a></li>  
                                @endforeach                           
                            </ul>
                        </div>



                    </div>

                    <div class="col-xxl-9 col-xl-8">


                        <div class="tab-content" id="v-pills-tabContent">
                             @foreach($solutions_channel_benefits as $benefit)
                            <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="benefitTab_{{$benefit->id}}">
                                <div class="card bg-gradiant-2 p-lg-3 p-1 border-0 rounded-24">
                                    <div class="card-body">
                                        <?php echo $benefit->benefit_details; ?>

                                        <ul class="list-style-3">
                                            <li>
                                                @if($benefit->card1_icon !='')
                                                <img src="{{url($benefit->card1_icon)}}" alt="{{$benefit->card1_icon_alt}}" title="{{$benefit->card1_icon_title}}">
                                                @endif
                                                <p>{{$benefit->card1_title}}</p>
                                            </li>
                                            <li>
                                                @if($benefit->card2_icon !='')
                                                <img src="{{url($benefit->card2_icon)}}" alt="{{$benefit->card2_icon_alt}}" title="{{$benefit->card2_icon_title}}">
                                                @endif
                                                <p>{{$benefit->card2_title}}</p>
                                            </li>
                                            <li>
                                                @if($benefit->card3_icon !='')
                                                <img src="{{url($benefit->card3_icon)}}" alt="{{$benefit->card3_icon_alt}}" title="{{$benefit->card3_icon_title}}">
                                                @endif
                                                <p>{{$benefit->card3_title}}</p>
                                            </li>
                                            <li>
                                                @if($benefit->card4_icon !='')
                                                <img src="{{url($benefit->card4_icon)}}" alt="{{$benefit->card4_icon_alt}}" title="{{$benefit->card4_icon_title}}">
                                                @endif
                                                <p>{{$benefit->card4_title}}</p>
                                            </li>
                                        </ul>
                                        <h5 class="fw-bold">{{$benefit->core_strength_title}}</h5>

                                        <!-- <ul class="list-check mt-3">
                                            <li>Fit for SMS. Versatile messaging system designed for SMS</li>
                                            <li>Fully customized. Speak in the language the customers understand, on
                                                the channels they access</li>
                                            <li>2-way messaging. To help solve queries real time</li>
                                            <li>100% global network coverage</li>
                                            <li>Nearing 100% uptime</li>
                                            <li>Realtime reporting for immediacy and improvement</li>
                                        </ul> -->
                                        <div class="sectionUl">
                                            <?php echo $benefit->core_strength_details; ?>
                                        </div>

                                        <!-- <h5 class="fw-bold mt-5">More Services</h5>
                                        <div class="more-services">
                                            <ul class="withborder mb-0 overflow-auto">
                                                <li>
                                                    <img src="assets/images/icons/usp-icon.svg" alt="">
                                                    <p>Promotional SMS Service</p>
                                                </li>
                                                <li>
                                                    <img src="assets/images/icons/usp-icon.svg" alt="">
                                                    <p>Promotional SMS Service</p>
                                                </li>
                                                <li>
                                                    <img src="assets/images/icons/usp-icon.svg" alt="">
                                                    <p>Promotional SMS Service</p>
                                                </li>
                                                <li>
                                                    <img src="assets/images/icons/usp-icon.svg" alt="">
                                                    <p>Promotional SMS Service</p>
                                                </li>
                                            </ul>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                            @endforeach 
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
                  Explore another Channels
                    
                </h2>
            </div>

            <div class="swiper case-slider">
                <div class="swiper-wrapper">
                    @foreach($solution_main_category as $data)
                    <div class="swiper-slide">
                        <div class="animated-list-card">
                            <a href="{{url('solutions')}}/{{$slug}}/{{strtolower($data->slug)}}"><img src="{{url($data->image)}}" class="w-100 card-img"
                                alt="{{$data->image_alt}}" title="{{$data->image_title}}" /></a>
                            <h6 class="fs-20 hover-color fw-bold">{{$data->title}}</h6>
                            <p>{{$data->detail}}
                            </p>
                            <a href="{{url('solutions')}}/{{$slug}}/{{strtolower($data->slug)}}"
                                class="d-flex translate align-items-center gap-2  grey-1 fw-semibold">{{$data->link_name}}
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
