@extends('layouts.app')

@section("htmlheader_title", $about_resourcespage_headings->meta_title)

@section("htmlheader_desc", $about_resourcespage_headings->meta_desc)

@section("htmlheader_keyword", $about_resourcespage_headings->meta_keyword)

@section('content')
<div class="py-5 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-7">
        <h1 class=" my-4 fs-68 fw-medium lh-1 text-m-40 text-capitalize"> 
          <!--  {{optional(\App\Models\AboutBanner::first())->title}}--> 
          <span class="d-lg-block typewrite" data-period="1000" data-type='["Redefining", "Designing"]'>Redefining</span> communication channels for businesses </h1>
        <p class="fs-20 grey-1 mb-4"> {{optional(\App\Models\AboutBanner::first())->detail}} </p>
        <a href="/contact-us" class="btn btn-warning">Delve Deeper</a> </div>
      <div class="col-lg-5"> <img src="{{url(optional(\App\Models\AboutBanner::first())->image)}}" class="w-100" alt="{{optional(\App\Models\AboutBanner::first())->image_alt}}" title="{{optional(\App\Models\AboutBanner::first())->image_title}}"> </div>
    </div>
  </div>
</div>
<section class="borderbottom" data-aos="fade-up">
  <div class="container">
    <div class="menu-overlay">
      <ul class="navmenu2 justify-content-start gap-lg-5 ">
        <li> <a href="{{url('about-us-company')}}" > Company <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
        <li> <a href="{{url('about-us-career')}}"> Career <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
        <li> <a href="{{url('about-us-resources')}}" class="active"> Resources <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
      </ul>
    </div>
  </div>
</section>
@if(!$about_resourcespage_media->isEmpty())
<section class="section-spacing " data-aos="fade-up">
  <div class="container">
    <div class="bg-gradiant-2 py-lg-5 rounded-5 p-4">
      <div class="reduce-90px-width ">
        <div class="row align-items-center  g-4">
          <div class="col-lg-12">
            <div class="badge-only"> <img src="{{url($about_resourcespage_headings->media_icon)}}" alt="{{$about_resourcespage_headings->media_title}}" /> {{$about_resourcespage_headings->media_title}} </div>
            <h6 class="fs-44 mt-3  mb-0 text-m-32">{{$about_resourcespage_headings->media_subtitle}} </h6>
          </div>
          @foreach($about_resourcespage_media as $media)
          <div class="col-lg-4">
            <div class="card case-card">
              <div class="card-body"> <a href="{{$media->third_party_link}}" target="_blank"><img src="{{url($media->image)}}" class="w-100" alt="{{$media->image_alt}}" title="{{$media->image_tite}}" /></a>
                <h6 class="fs-5 fw-bold"><a href="{{$media->third_party_link}}" class="text-dark" target="_blank">{{$media->title}}</a></h6>
                <a href="{{$media->third_party_link}}" class="d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold translate" target="_blank">{{$media->cta_name}} <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a> </div>
            </div>
          </div>
          @endforeach </div>
      </div>
    </div>
  </div>
</section>
@endif

    @if(!$about_resourcespage_blogs->isEmpty())
    <section class="section-spacing" id="my-section" data-aos="fade-up">
  <div class="container">
        <div class="reduce-90px-width">
      <div class="row align-items-center g-4">
            <div class="col-lg-12">
          <div class="badge-only mb-3"> <img src="{{url($about_resourcespage_headings->blogs_icon)}}" alt="{{$about_resourcespage_headings->blogs_title}}" /> {{$about_resourcespage_headings->blogs_title}} </div>
          <h5 class="fs-44 fw-medium text-m-32">{{$about_resourcespage_headings->blogs_subtitle}}</h5>
        </div>
            @foreach($about_resourcespage_blogs as $blog)
            <div class="col-lg-4">
          <div class="card case-card">
                <div class="card-body"> <a href="{{url('blog/'.$blog->cta_link)}}"><img src="{{url($blog->image)}}" class="w-100" alt="{{$blog->image_alt}}" title="{{$blog->image_tite}}" />
              <h6 class="fs-5 fw-bold hover-color grey-heading">{{$blog->title}}</h6></a>
              <p> {{$blog->content}} </p>
              <a href="{{url('blog/'.$blog->cta_link)}}" class="d-flex align-items-center gap-2 pt-2 grey-1 translate fw-semibold"><?php /*?>{{$blog->cta_name}}<?php */?> Learn More <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a> </div>
              </div>
        </div>
            @endforeach
            <div class="col-lg-12">
          <nav aria-label="Page navigation example">
                <ul class="blog-pagination my-3">
              {{-- Previous Page Link --}}
              @if ($about_resourcespage_blogs->onFirstPage())
              <li class="disabled"> <span><img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt=""></span> </li>
              @else
              <li> <a class="page-link" href="{{ $about_resourcespage_blogs->previousPageUrl() }}#my-section"> <img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt=""> </a> </li>
              @endif
              
              {{-- Pagination Elements --}}
              @foreach ($about_resourcespage_blogs->links()->elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
              <li class="disabled"><span>{{ $element }}</span></li>
              @endif
              
              {{-- Array of Links --}}
              @if (is_array($element))
              @foreach ($element as $page => $url)
              @if ($page == $about_resourcespage_blogs->currentPage())
              <li class="page-item active"> <a class="page-link" href="#">{{ $page }}</a> </li>
              @else
              <li class="page-item"> <a class="page-link" href="{{ $url }}#my-section">{{ $page }}</a> </li>
              @endif
              @endforeach
              @endif
              @endforeach
              
              {{-- Next Page Link --}}
              @if ($about_resourcespage_blogs->hasMorePages())
              <li> <a class="page-link" href="{{ $about_resourcespage_blogs->nextPageUrl() }}#my-section"> <img src="{{ url('assets/images/icons/chev-arrow-right.svg') }}" alt=""> </a> </li>
              @else
              <li class="disabled"> <span><img src="{{ url('assets/images/icons/chev-arrow-right.svg') }}" alt=""></span> </li>
              @endif
            </ul>
              </nav>
        </div>
          </div>
    </div>
      </div>
</section>
@endif
    @if(!$about_resourcespage_webinars->isEmpty())
    <section class="section-spacing " data-aos="fade-up">
  <div class="container">
        <div class="bg-gradiant-1 py-lg-5 rounded-5 p-4 pb-5">
      <div class="reduce-90px-width">
            <div class="row align-items-center g-4">
          <div class="col-lg-12">
                <div class="badge-only mb-3"> <img src="{{url($about_resourcespage_headings->webinars_icon)}}" alt="{{$about_resourcespage_headings->webinars_title}}" /> {{$about_resourcespage_headings->webinars_title}} </div>
                <h5 class="fs-44 fw-medium text-m-32">{{$about_resourcespage_headings->webinars_subtitle}}</h5>
              </div>
          <div class="col-lg-12">
                <div class="position-relative toparrowspace">
              <div class="swiper worklife-slider pb-5">
                    <div class="swiper-wrapper"> @foreach($about_resourcespage_webinars as $webinar)
                  <div class="swiper-slide">
                        <div class="card case-card">
                      <div class="card-body"> <a href="{{$webinar->third_party_link}}" target="_blank"><img src="{{url($webinar->image)}}" class="w-100" alt="{{$webinar->image_alt}}" title="{{$webinar->image_tite}}" /></a>
                            <h6 class="fs-5 fw-bold"><a href="{{$webinar->third_party_link}}" class="text-dark" target="_blank">{{$webinar->title}}</a></h6>
                            <p> {{$webinar->short_desc}} </p>
                            <a href="{{$webinar->third_party_link}}" target="_blank" class="d-flex align-items-center gap-2 pt-2 grey-1 translate fw-semibold">{{$webinar->cta_name}} <img src="{{url('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a> </div>
                    </div>
                      </div>
                  @endforeach </div>
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
@endsection



@section('script_content')

@endsection 