@extends('layouts.app')

@section("htmlheader_title", $homepage->meta_title)

@section("htmlheader_desc", $homepage->meta_description)

@section("htmlheader_keyword", $homepage->meta_keywords)

@section('content')
    

    <div class="py-4 py-lg-5 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-7">
                    <h1 class="my-lg-4 my-2  fs-68 fw-medium lh-1 text-m-40">
                        {{optional(\App\Models\SolutionBanner::first())->title}}
                    </h1>
                    <p class="fs-5 grey-1 mb-4 text-m-16">
                        {{optional(\App\Models\SolutionBanner::first())->detail}}
                    </p>
                    <a href="{{optional(\App\Models\SolutionBanner::first())->cta_link}}" class="btn btn-warning">{{optional(\App\Models\SolutionBanner::first())->cta_name}}</a>
                </div>
                <div class="col-lg-5">
                    <img src="{{url(optional(\App\Models\SolutionBanner::first())->image)}}" class="w-100 hero-img" alt="{{optional(\App\Models\SolutionBanner::first())->image_alt}}" alt="{{optional(\App\Models\SolutionBanner::first())->image_title}}">
                </div>
            </div>
        </div>
    </div>

    <section class="borderbottom d-none d-lg-flex">
        <div class="container">
            <ul class="navmenu2 ">
                
                @foreach($solution_main_category as $category)
                @php
                $slugUrl = str_slug($category->name);
                @endphp
                <li>
                    <a href="{{ $loop->first ? url('solutions') : url('solutions/'.$slugUrl) }}" class="@if($slug == $slugUrl) active @endif">
                        {{$category->name}} <img src="{{asset('assets/images/icons/right-icon.svg')}}" alt="">
                    </a>
                </li>
                @endforeach
            </ul>


        </div>

    </section>

    <section class="d-lg-none pt-5 pb-0 px-3">
        <div class="dropdown navmenu2drop">
            @foreach($solution_main_category as $category)

            @if($loop->first)
            <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
               {{$category->name}}
            </button>
            @endif
            @endforeach
            <ul class="dropdown-menu">
                @foreach($solution_main_category as $category)
                @php
                $slugUrl = str_slug($category->name);
                @endphp
                @if(!$loop->first)
                <li><a class="dropdown-item" href="{{url($slugUrl)}}"> {{$category->name}}</a></li>
                @endif
                @endforeach
            </ul>
        </div>
    </section>

    @if(!$solution_sub_categories->isEmpty())
    <section class="pt-5">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="position-relative toparrowspace hidedeskarrow">
                    <div class="swiper case-mswiper">
                        <div class="swiper-wrapper">
                            @foreach($solution_sub_categories as $subcat)
                            <div class="swiper-slide">
                                <div class="animated-list-card">
                                    <img src="{{url($subcat->image)}}" class="w-100 card-img" alt="{{$subcat->image_alt}}" title="{{$subcat->image_title}}" />
                                    <h6 class="fs-20 fw-bold">{{$subcat->title}}</h6>
                                    <p>{{$subcat->detail}}</p>
                                    <a href="#" class="d-flex align-items-center gap-2  grey-1 fw-semibold">{{$subcat->link_name}}
                                        <img src="{{asset('assets/images/icons/grey-arrow.svg')}}" class="mb-0" alt=""></a>
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
    </section>
    @endif

    <section class="section-spacing">
        <div class="container">
            <div class="bg-gradiant-2 p-4 p-lg-5 rounded-5 d-flex flex-column gap-4 align-items-start w-100 ">

                <div class="badge-only mb-0">
                    <img src="assets/images/icons/target-yellow-icon.svg" alt="" />
                    Our impact in numbers
                </div>
                <h2 class="fs-44 fw-medium mb-0 text-m-32">
                    Supercharging financial <span class="d-lg-block"> success worldwide</span>
                </h2>
                <p class="m-0 grey-1">Every figure represents a story of financial empowerment and success. <span
                        class="d-lg-block"> Discover how our app can add to
                        your story. </span></p>
                <ul class="auto-increment-list">
                    <li>
                        <h3>15+</h3>
                        <p>Billions annual messages</p>
                    </li>
                    <li>
                        <h3>150+</h3>
                        <p>Millions voice pulses annually</p>
                    </li>
                    <li>
                        <h3>250+</h3>
                        <p>Enterprise customers</p>
                    </li>
                    <li>
                        <h3>1500+</h3>
                        <p>Telco connects globally</p>
                    </li>
                    <li>
                        <h3>250%</h3>
                        <p>Growth last financial year</p>
                    </li>
                </ul>

                <div class="star-link">
                    <img src="assets/images/icons/star-green-icon.svg" alt="">
                    4.9 / 5.0 on <span> Trustpilot </span> | <a href="">Learn More</a>
                </div>
            </div>
        </div>
    </section>


    <section class="text-center section-spacing">
        <div class="badge-only mb-0">
            <img src="assets/images/icons/heart-yellow-icon.svg" alt="" />
            Use Cases
        </div>

        <h3 class="mt-4 mb-4 mb-lg-5 fs-44 fw-medium text-m-32">Compliance and Recognition Accolades</h3>
        <ul class="brands-2">
            <li><img src="assets/images/brands/treva.svg" alt=""></li>
            <li><img src="assets/images/brands/atica.svg" alt=""></li>
            <li><img src="assets/images/brands/solaytic.svg" alt=""></li>
            <li><img src="assets/images/brands/u-mark.svg" alt=""></li>
            <li><img src="assets/images/brands/volicity-9.svg" alt=""></li>
        </ul>
    </section>

    <section class="section-spacing">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card bg-gradiant-2 p-3 rounded-4 border-0">
                            <div class="card-body">
                                <img src="assets/images/brands/kanba-logo.png" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">Doubtnut increased tutor-student engagement rate by
                                    260% with
                                    WhatsApp chatbot</h6>
                                <p class="fs-5 mb-0"> The education platform provider Doubtnut went live with a WhatsApp
                                    chatbot to provide a streamlined experience and a 95% user satisfaction rate</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card bg-gradiant-2 p-3 rounded-4 border-0">
                            <div class="card-body">
                                <img src="assets/images/brands/kanba-logo.png" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">Doubtnut increased tutor-student engagement rate by
                                    260% with
                                    WhatsApp chatbot</h6>
                                <p class="fs-5 mb-0"> The education platform provider Doubtnut went live with a WhatsApp
                                    chatbot to provide a streamlined experience and a 95% user satisfaction rate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-spacing">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="badge-only mb-0">
                            <img src="assets/images/icons/usp-yellow-icon.svg" alt="" />
                            USP
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="fs-44 fw-medium mb-0 text-m-32">Our commitment to delivering <span class="d-lg-block">
                                unparalleled service </span></h4>
                    </div>
                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-gradiant-2 p-1 comman-card ">
                            <div class="card-body">
                                <img src="assets/images/icons/usp-icon.svg" alt="">
                                <h6 class="fs-5 fw-bold my-3 pb-0">USP Title 1</h6>
                                <p class="mb-0">Be Heard By All Those Important to You with Impactful Voice Solutions
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    @endsection



@section('script_content')



@endsection
