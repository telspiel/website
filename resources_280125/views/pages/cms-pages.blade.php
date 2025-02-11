@extends('layouts.app')

@section("htmlheader_title", $web_pages->meta_title)

@section("htmlheader_desc", $web_pages->meta_desc)

@section("htmlheader_keyword", $web_pages->meta_keyword)

@section('content')
<div class="py-lg-5 py-4 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center gy-4">
      <div class="col-lg-12 order-lg-1 order-2">
        <h1 class="my-lg-4 my-3 fs-68 fw-medium lh-1 text-m-40">{{$web_pages->title}}</h1>
      </div>
    </div>
  </div>
</div>
<section class="section-spacing" data-aos="fade-up">
  <div class="container">
    <div class="reduce-90px-width">
      <div class="row">
        <div class="col-lg-12">
          <?php echo $web_pages->content; ?>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection



@section('script_content')


@endsection
