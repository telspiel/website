@extends('layouts.app')

@section("htmlheader_title", $success_storypage_casestudy->meta_title)

@section("htmlheader_desc", $success_storypage_casestudy->meta_desc)

@section("htmlheader_keyword", $success_storypage_casestudy->meta_keyword)

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<div class="py-lg-5 py-4 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center gy-4">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="badge-only ">
                        <img src="{{url('assets/images/icons/appas-yellow-icon.svg')}}" alt="" />
                        Case Study
                    </div>
                    <h1 class="my-lg-4 my-3 fs-68 fw-medium lh-1 text-m-40">
                        {{$success_storypage_casestudy->title}}
                    </h1>
                    <p class="fs-20 grey-1 mb-4 text-m-16">
                        {{$success_storypage_casestudy->shot_desc}}
                    </p>

                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <img src="{{url($success_storypage_casestudy->image)}}" class="w-100" alt="{{$success_storypage_casestudy->image_alt}}" title="{{$success_storypage_casestudy->image_title}}">
                </div>
            </div>
        </div>
    </div>

    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <ul class="big-numbers">
                <li> {{$success_storypage_casestudy->number_perc_data1}} <p>{{$success_storypage_casestudy->oneliner_perc_data1}}</p>
                </li>
                <li> {{$success_storypage_casestudy->number_perc_data2}} <p>{{$success_storypage_casestudy->oneliner_perc_data2}}</p>
                </li>
                <li> {{$success_storypage_casestudy->number_perc_data3}} <p>{{$success_storypage_casestudy->oneliner_perc_data3}}</p>
                </li>
            </ul>
        </div>
    </section>

    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="fw-bold">Company</h5>
                        <p>{{$success_storypage_casestudy->company_desc}}</p>

                        <br>
                        <h5 class="fw-bold">Website</h5>
                        <p class="text-success">{{$success_storypage_casestudy->website}}</p>

                        <br>
                        <h5 class="fw-bold">Headquarters</h5>
                        <p>{{$success_storypage_casestudy->headquaters}}</p>

                        <br>
                        <h5 class="fw-bold">Industry</h5>
                        <p>{{$success_storypage_casestudy->industry}}</p>

                        <br>
                        <h5 class="fw-bold">Products Used</h5>
                        
                        <p>
                            @foreach($productArray as $product) 
                                {{trim($product)}} <br>
                            @endforeach
                        </p>


                    </div>
                    <div class="col-lg-8 sectionUl">
                        
                        <?php echo $success_storypage_casestudy->details; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(!$about_company_testimonials->isEmpty())
    <section class="section-spacing " data-aos="fade-up">
        <div class="container">
            <div class=" bg-gradiant-2 rounded-24 py-lg-5 p-4 pb-5">
                <div class="reduce-90px-width py-lg-4">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-12">
                            <div class="badge-only mb-3">
                                <img src="{{url(optional(\App\Models\SuccessStoryPageHeading::first())->testimonial_icon)}}" alt="" />
                                {{optional(\App\Models\SuccessStoryPageHeading::first())->testimonial_title}}
                            </div>
                            <h5 class="fs-44 fw-medium text-m-32">{{optional(\App\Models\SuccessStoryPageHeading::first())->testimonial_sub_title}}</h5>
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative ">


                                <div class="swiper leadership-slider pb-4">
                                    <div class="swiper-wrapper">
                                        @foreach($about_company_testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="row gx-lg-5 align-items-center gy-4">
                                                <div class="col-lg-5">
                                                    <img src="{{url($testimonial->image)}}" class="w-100" alt="{{$testimonial->image_alt}}" title="{{$testimonial->image_title}}" />
                                                </div>
                                                <div class="col-lg-7">
                                                    <p class="fw-light mb-5 desc">{{$testimonial->short_desc}}</p>
                                                    <p class="fs-3 mb-0 fw-semibold">
                                                        {{$testimonial->name}}
                                                    </p>
                                                    <p class="fs-5">{{$testimonial->designation}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!$success_storypage_casestudyMore->isEmpty())
    <section class="section-spacing"  id="my-section" data-aos="fade-up">
        
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row align-items-center g-4">
                    <div class="col-lg-12">
                        <div class="badge-only mb-3">
                            <img src="{{url('assets/images/icons/heart-yellow-icon.svg')}}" alt="" />
                                Succss Story
                        </div>
                        <h5 class="fs-44 fw-medium text-m-32">Check Out More</h5>
                    </div>
                    @foreach($success_storypage_casestudyMore as $caseStudy)
                    <div class="col-lg-4">
                      <div class="card case-card">
                        <div class="card-body">
                        @if($caseStudy->type == 'Youtube_video')
                        <a class="popup-youtube" href="{{$caseStudy->youtube_video_link}}">
                            <img src="{{url($caseStudy->image)}}" class="w-100" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" />
                        </a>
                        @else
                        <a href="{{url('success-story').'/'.$caseStudy->cta_url}}"><img src="{{url($caseStudy->image)}}" class="w-100" alt="{{$caseStudy->image_alt}}" title="{{$caseStudy->image_title}}" /></a>
                        @endif
                          
                          <h6 class="fs-5 fw-bold"><a href="{{url('success-story').'/'.$caseStudy->cta_url}}">{{$caseStudy->title}}</a></h6>
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
                    <div class="col-lg-12">
                        <nav aria-label="Page navigation example">
                            <ul class="blog-pagination my-3">
                                {{-- Previous Page Link --}}
                                @if ($success_storypage_casestudyMore->onFirstPage())
                                    <li class="disabled">
                                        <span><img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt=""></span>
                                    </li>
                                @else
                                    <li>
                                        <a class="page-link" href="{{ $success_storypage_casestudyMore->previousPageUrl() }}#my-section">
                                            <img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt="">
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($success_storypage_casestudyMore->links()->elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                        <li class="disabled"><span>{{ $element }}</span></li>
                                    @endif

                                    {{-- Array of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $success_storypage_casestudyMore->currentPage())
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $url }}#my-section">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($success_storypage_casestudyMore->hasMorePages())
                                    <li>
                                        <a class="page-link" href="{{ $success_storypage_casestudyMore->nextPageUrl() }}#my-section">
                                            <img src="{{ url('assets/images/icons/chev-arrow-right.svg') }}" alt="">
                                        </a>
                                    </li>
                                @else
                                    <li class="disabled">
                                        <span><img src="{{ url('assets/images/icons/chev-arrow-right.svg') }}" alt=""></span>
                                    </li>
                                @endif
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

@endsection



@section('script_content')
<script>
    $('.sectionUl').find('ul').addClass('list-check mt-4');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
$(document).ready(function() {
    $('.popup-youtube').magnificPopup({
    type: 'iframe'
  });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const section = urlParams.get('section');
        if (section) {
            const targetElement = document.getElementById(section);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });
</script>

@endsection
