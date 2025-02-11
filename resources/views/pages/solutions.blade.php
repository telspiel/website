@extends('layouts.app')

@section("htmlheader_title", optional(\App\Models\SolutionPageHeading::first())->meta_title)

@section("htmlheader_desc", optional(\App\Models\SolutionPageHeading::first())->meta_des)

@section("htmlheader_keyword", optional(\App\Models\SolutionPageHeading::first())->meta_keyword)

@section('content')
<div class="py-4 py-lg-5 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-7 aos-init aos-animate" data-aos="fade-right">
        <!-- <h1 class="my-lg-4 my-2  fs-68 fw-medium lh-1 text-m-40"> {{optional(\App\Models\SolutionBanner::first())->title}} </h1>-->
		  <h1 class="my-lg-4 my-2  fs-68 fw-medium lh-1 text-m-40 text-capitalize aos-init aos-animate" data-aos="fade-right"><span class="d-lg-block typewrite" data-period="1000" data-type='["Streamline Enterprise", "Simplify Business"]'>Streamline Enterprise</span>  Communications with Cutting-Edge solutions
</h1>
        <p class="fs-5 grey-1 mb-4 text-m-16 aos-init aos-animate" data-aos="fade-right"> {{optional(\App\Models\SolutionBanner::first())->detail}} </p>
        <a href="{{optional(\App\Models\SolutionBanner::first())->cta_link}}" class="btn btn-warning aos-init aos-animate" data-aos="fade-right">{{optional(\App\Models\SolutionBanner::first())->cta_name}}</a> </div>
      <div class="col-lg-5"> <img src="{{url(optional(\App\Models\SolutionBanner::first())->image)}}" class="w-100 hero-img aos-init aos-animate" data-aos="fade-right" alt="{{optional(\App\Models\SolutionBanner::first())->image_alt}}" alt="{{optional(\App\Models\SolutionBanner::first())->image_title}}"> </div>
    </div>
  </div>
</div>
<section class="d-lg-none pt-5 pb-0 px-3" data-aos="fade-up">
  <div class="dropdown navmenu2drop"> @foreach($solution_main_category as $category)
    @if($loop->first)
    <button type="button " class="changetext" data-bs-toggle="dropdown" aria-expanded="false"> {{$category->name}} </button>
    @endif
    @endforeach
    <ul class="dropdown-menu" role="tablist">
      @foreach($solution_main_category as $category)
      <li role="presentation"><a class="dropdown-item {{ $loop->first ? 'active' : '' }}" href="#areaId_{{$category->id}}" data-bs-toggle="tab"
                        data-tab-name="{{$category->name}}">{{$category->name}}</a></li>
      @endforeach
    </ul>
  </div>
</section>
<section class="borderbottom d-none d-lg-block" data-aos="fade-up">
  <div class="container">
    <ul class="nav navmenu2" id="myTab" role="tablist">
      @foreach($solution_main_category as $category)
      <li class="nav-item" role="presentation"> <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tabClick_{{$category->id}}" data-bs-toggle="tab" href="#areaId_{{$category->id}}" role="tab"
                        aria-controls="areaId_{{$category->id}}" aria-selected="true">{{$category->name}} <img
                            src="{{asset('assets/images/icons/right-icon.svg')}}" alt=""></a> </li>
      @endforeach
    </ul>
  </div>
</section>
<section class="pt-5">
  <div class="container">
    <div class="tab-content" id="myTabContent"> @foreach($solution_main_category as $category)
      <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="areaId_{{$category->id}}" role="tabpanel" aria-labelledby="tabClick_{{$category->id}}"> @php
        $solution_sub_categories = DB::table('solution_sub_categories')
        ->select('solution_sub_categories.*')
        ->where('cat_id',$category->id)
        ->where('status','Enable')
        ->get();
        @endphp
        @if(!$solution_sub_categories->isEmpty())
        <div class="reduce-90px-width">
          <div class="position-relative toparrowspace hidedeskarrow">
            <div class="swiper case-mswiper">
              <div class="swiper-wrapper"> @foreach($solution_sub_categories as $subcat)
                <div class="swiper-slide">
                  <div class="animated-list-card aos-init aos-animate" data-aos="fade-up"> <a href="{{url('solutions')}}/{{$category->slug}}/{{strtolower($subcat->slug)}}"><img src="{{url($subcat->image)}}" class="w-100 card-img"
                                                 alt="{{$subcat->image_alt}}" title="{{$subcat->image_title}}" /></a>
                    <h6 class="fs-20 fw-bold hover-color">{{$subcat->title}}</h6>
                    <p>{{$subcat->detail}} </p>
                    <a href="{{url('solutions')}}/{{$category->slug}}/{{strtolower($subcat->slug)}}"
                                                class="d-flex align-items-center  gap-2 text-hover-img grey-1 translate fw-semibold">{{$subcat->link_name}} <img src="{{asset('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a> </div>
                </div>
                @endforeach </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
        </div>
        @endif </div>
      @endforeach </div>
  </div>
</section>
@if(!$our_impacts_numbers->isEmpty())
<section class="section-spacing" data-aos="fade-up">
  <div class="container">
    <div class="bg-gradiant-2 p-4 p-lg-5 rounded-5 d-flex flex-column gap-4 align-items-start w-100 ">
      <div class="badge-only mb-0"> <img src="{{url(optional(\App\Models\SolutionPageHeading::first())->our_impact_icon)}}" alt="" /> {{optional(\App\Models\SolutionPageHeading::first())->our_impact_title}} </div>
      <h2 class="fs-44 fw-medium mb-0 text-m-32"> {{optional(\App\Models\SolutionPageHeading::first())->our_impact_subtitle}} </h2>
      <p class="m-0 grey-1"> {{optional(\App\Models\SolutionPageHeading::first())->our_impact_shortdesc}}
      <ul class="auto-increment-list">
        @foreach($our_impacts_numbers as $numbers)
        <li>
          <h3><span class="number" data-target="{{$numbers->total_numbers}}"></span>{{$numbers->arithmetical_sign}}</h3>
          <p>{{$numbers->one_liners_shortdesc}}</p>
        </li>
        @endforeach
      </ul>
      <div class="star-link"> <a href="{{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_link}}" target="_blank"><img src="{{asset('assets/images/icons/star-green-icon.svg')}}" alt=""> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_rating}} <span> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_trustpilot}} </span> | {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_name}}</a> </div>
    </div>
  </div>
</section>
@endif
    @if(!$solution_usecaselogo->isEmpty())
    <section class="text-center section-spacing" data-aos="fade-up">
  <div class="badge-only mb-0"> <img src="{{url(optional(\App\Models\SolutionPageHeading::first())->use_case_icon)}}" alt="" /> {{optional(\App\Models\SolutionPageHeading::first())->use_case_title}} </div>
  <h3 class="mt-4 mb-4 mb-lg-5 fs-44 fw-medium text-m-32">{{optional(\App\Models\SolutionPageHeading::first())->use_case_subtitle}}</h3>
  <ul class="brands-2">
        @foreach($solution_usecaselogo as $logo)
        <li><img class="scale" src="{{url($logo->logo)}}" alt="{{$logo->image_alt}}" title="{{$logo->image_title}}"></li>
        @endforeach
      </ul>
</section>
@endif
    @if(!$solution_usecasecontent->isEmpty())
   <!--  <section class="section-spacing">
  <div class="container">
        <div class="reduce-90px-width">
      <div class="row g-4"> @foreach($solution_usecasecontent as $content)
            <div class="col-lg-6">
          <div class="card bg-gradiant-2 p-3 rounded-4 border-0">
                <div class="card-body"> <img src="{{url($content->icon)}}" alt="{{$content->image_alt}}" title="{{$content->image_title}}">
              <h6 class="fs-5 fw-bold my-3 pb-0">{{$content->title}}</h6>
              <p class="fs-5 mb-0"> {{$content->content}}</p>
            </div>
              </div>
        </div>
            @endforeach </div>
    </div>
      </div>
</section>-->
@endif
    @if(!$solution_usp->isEmpty())
    <section class="section-spacing">
  <div class="container">
        <div class="reduce-90px-width">
      <div class="row g-4">
            <div class="col-lg-12">
          <div class="badge-only mb-0 aos-init aos-animate" data-aos="fade-up"> <img src="{{url(optional(\App\Models\SolutionPageHeading::first())->usp_icon)}}" alt="" /> {{optional(\App\Models\SolutionPageHeading::first())->usp_title}} </div>
        </div>
            <div class="col-lg-12">
          <h4 class="fs-44 fw-medium mb-0 text-m-32 aos-init aos-animate" data-aos="fade-up">{{optional(\App\Models\SolutionPageHeading::first())->usp_subtitle}}</h4>
        </div>
            @foreach($solution_usp as $usp)
            <div class="col-lg-4">
          <div class="card bg-gradiant-2 p-1 comman-card aos-init aos-animate" data-aos="fade-up">
                <div class="card-body"><div class="icon_about img"><img src="{{url($usp->icon)}}" alt=""></div> 
              <h6 class="fs-5 fw-bold hover-color my-3 pb-0">{{$usp->title}}</h6>
              <p class="mb-0">{{$usp->short_des}} </p>
            </div>
              </div>
        </div>
            @endforeach </div>
    </div>
      </div>
</section>
@endif
    @endsection



@section('script_content') 
<script>
   

    function initSwiper() {
        if (window.innerWidth <= 1024) {
            var swiper = new Swiper('.case-mswiper', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }
    }
    initSwiper();
    window.addEventListener('resize', function() {
        if (window.innerWidth <= 1024) {
            if (typeof swiper === 'undefined') {
                initSwiper();
            }
        } else {
            if (typeof swiper !== 'undefined' && swiper !== null) {
                swiper.destroy();
                swiper = null;
            }
        }
    });
    </script> 
@endsection 