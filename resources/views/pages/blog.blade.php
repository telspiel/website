@extends('layouts.app')

@section("htmlheader_title", "")

@section("htmlheader_desc", "")

@section("htmlheader_keyword", "")

@section('content')
<div class="py-5 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-7">
        <h1 class=" my-lg-4 mb-2  fs-68 fw-medium lh-1 text-m-40"> Latest Insights </h1>
        <p class="fs-20 grey-1 mb-4">Stay ahead with our curated knowledge and expert perspectives. Explore cutting-edge trends, actionable strategies, and in-depth analysis to transform your vision into reality. </p>
      </div>
      <div class="col-lg-5"> <img src="{{asset('assets/images/success.svg')}}" class="w-100" alt=""> </div>
    </div>
  </div>
</div>

<section class="section-spacing" id="my-section" data-aos="fade-up">
  <div class="container">
	  <div class="reduce-90px-width">
     <div class="row align-items-center g-4">
     @if(!$about_resourcespage_blogs->isEmpty())   
     @foreach($about_resourcespage_blogs as $blog)
      <div class="col-lg-4">
         <div class="card case-card">
          <div class="card-body"> <a href="{{url('blog/'.$blog->cta_link)}}"><img src="{{url($blog->image)}}" class="w-100" alt="{{$blog->image_alt}}" /></a>
            <a href="{{url('blog/'.$blog->cta_link)}}" class="grey-heading"><h6 class="fs-5 fw-bold">{{$blog->title}}</h6></a>
			  
		
			  
            <p> {{$blog->content}} </p>
            <a href="{{url('blog/'.$blog->cta_link)}}" class="d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold">Learn More <img src="{{asset('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a> </div>
        </div>
      </div>
     @endforeach
     @endif
		  </div></div>
  </div>
</section>

@endsection



@section('script_content')


@endsection
