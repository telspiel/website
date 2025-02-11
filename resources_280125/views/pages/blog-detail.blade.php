@extends('layouts.app')

@section("htmlheader_title", $blog->meta_title)

@section("htmlheader_desc", $blog->meta_desc)

@section("htmlheader_keyword", $blog->meta_keywords)

@section('content')
<div class="py-lg-5 py-4 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center gy-4">
      <div class="col-lg-6 order-lg-1 order-2">
        <div class="badge-only "> <img src="{{asset('assets/images/icons/appas-yellow-icon.svg')}}" alt="" /> Blog </div>
        <h1 class="my-lg-4 my-3 fs-68 fw-medium lh-1 text-m-40">{{$blog->title}} </h1>
        <p class="fs-20 grey-1 mb-4 text-m-16">{{$blog->content}}</p>
      </div>
      <div class="col-lg-6 order-lg-2 order-1"> <img src="{{url($blog->image)}}" class="w-100" alt="{{$blog->image_alt}}"> </div>
    </div>
  </div>
</div>
<section class="section-spacing">
  <div class="container">
    <div class="reduce-90px-width">
      <div class="row">
        <div class="col-lg-4">
          <div class="bg-gradiant-2 p-4 p-lg-5 rounded-5 d-flex flex-column gap-4 align-items-start">
            <h5 class="fw-bold">Latest Articles</h5>
            <ul class="list-check">
                @foreach($latest_articles as $latest_article)
              <li><a href="{{url('blog/'.$latest_article->cta_link)}}">{{$latest_article->title}}</a>
</li>
                @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-8">
          {!! $blog->description !!}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection



@section('script_content')


@endsection
