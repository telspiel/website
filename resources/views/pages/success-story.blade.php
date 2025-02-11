@extends('layouts.app')

@section("htmlheader_title", $success_storypage_headings->meta_title)

@section("htmlheader_desc", $success_storypage_headings->meta_desc)

@section("htmlheader_keyword", $success_storypage_headings->meta_keyword)

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    
    
    <div class="py-5 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-7">
                    <h1 class=" my-lg-4 fs-68 fw-medium lh-1 text-m-40">
                        <!-- {{$success_storypage_banners->title}}--><span class="d-lg-block typewrite" data-period="1000" data-type='["Empowering", "Endorsing"]'>Empowering</span> Success Stories
                    </h1>
                    <p class="fs-5 grey-1 mb-4 text-m-16">
                        {{$success_storypage_banners->detail}}
                    </p>
					<a href="/contact-us" class="btn btn-warning">Let’s Collaborate</a>
                </div>
                <div class="col-lg-5">
                    <img src="{{url($success_storypage_banners->image)}}" class="w-100 hero-img" alt="{{$success_storypage_banners->image_alt}}" title="{{$success_storypage_banners->image_title}}">
                </div>
            </div>
        </div>
    </div>
    @if(!$success_storypage_casestudy->isEmpty())
      <section class="section-spacing" id="successStorySection" data-aos="fade-up">
        <div class="container">
            <form  action="{{ url('success-story') }}#successStorySection" method="GET" id="job-filter-form">
          <div class="row gy-3">
            <div class="col-lg-12">
              <h5 class="fw-bold mb-0 fs-5">{{$success_storypage_headings->filter_by_title}} </h5>
            </div>
            <div class="col-lg-3">
              <select class="form-select filterData" name="industry_filter" id="industry-filter" data-placeholder="Filter by Industry">
                <option></option>
                @foreach($success_storypage_indsId as $caseStudy)
                <option value="{{$caseStudy->industry_id}}"  {{ request('industry_filter') == $caseStudy->industry_id ? 'selected' : '' }}>{{optional(\App\Models\SolutionSubCategory::where('id',$caseStudy->industry_id)->first())->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3">
              <select class="form-select filterData" name="product_filter" id="products-filter" data-placeholder="Filter by Products">
                <option></option>
                @foreach($success_storypage_prodId as $caseStudy)
                <option value="{{$caseStudy->product_id}}" {{ request('product_filter') == $caseStudy->product_id ? 'selected' : '' }}>{{optional(\App\Models\SolutionSubCategory::where('id',$caseStudy->product_id)->first())->title}}</option>
                @endforeach
              </select>
            </div>
          </div>
      </form>
        </div>

      </section>
      
      <section class="section-spacing" id="my-section" data-aos="fade-up">
        <div class="container">

          <div class="row align-items-center g-4">
            @foreach($success_storypage_casestudy as $caseStudy)
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
                  
                  <h6 class="fs-5 fw-bold"><a href="{{url('success-story').'/'.$caseStudy->cta_url}}" class="grey-heading">{{$caseStudy->title}}</a></h6>
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
                                @if ($success_storypage_casestudy->onFirstPage())
                                    <li class="disabled">
                                        <span><img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt=""></span>
                                    </li>
                                @else
                                    <li>
                                        <a class="page-link" href="{{ $success_storypage_casestudy->previousPageUrl() }}#my-section">
                                            <img src="{{ url('assets/images/icons/chev-arrow-left.svg') }}" alt="">
                                        </a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($success_storypage_casestudy->links()->elements as $element)
                                    {{-- "Three Dots" Separator --}}
                                    @if (is_string($element))
                                        <li class="disabled"><span>{{ $element }}</span></li>
                                    @endif

                                    {{-- Array of Links --}}
                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            @if ($page == $success_storypage_casestudy->currentPage())
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
                                @if ($success_storypage_casestudy->hasMorePages())
                                    <li>
                                        <a class="page-link" href="{{ $success_storypage_casestudy->nextPageUrl() }}#my-section">
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
      </section>
      @endif
      @if(!$success_storypage_usecaselogo->isEmpty())
      <section class="text-center section-spacing" data-aos="fade-right">
        <div class="badge-only mb-0">
          <img src="{{url($success_storypage_headings->use_case_icon)}}" alt="" />
          {{$success_storypage_headings->use_case_title}}
        </div>

        <h3 class="mt-4 mb-5 fs-44 fw-medium text-m-32">{{$success_storypage_headings->use_case_subtitle}}</h3>
        <ul class="brands-2">
          @foreach($success_storypage_usecaselogo as $logo)
            <li><img class="scale" src="{{url($logo->logo)}}" alt="{{$logo->image_alt}}" title="{{$logo->image_title}}"></li>
            @endforeach
        </ul>
      </section>
      @endif

@endsection



@section('script_content')

<script>
    $('.filterData').on('change', function() {
        
        $('#job-filter-form').submit();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
$(document).ready(function() {
    $('.popup-youtube').magnificPopup({
    type: 'iframe'
  });
});
</script>
@if(session('section'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const section = "{{ session('section') }}";
            if (section) {
                window.location.hash = '#' + section;
            }
        });
    </script>
@endif

@endsection
