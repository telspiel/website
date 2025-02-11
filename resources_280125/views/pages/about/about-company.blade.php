@extends('layouts.app')

@section("htmlheader_title", $about_companypage_contents->meta_title)

@section("htmlheader_desc", $about_companypage_contents->meta_desc)

@section("htmlheader_keyword", $about_companypage_contents->meta_keyword)
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
/>
@section('content')
    
    <div class="py-5 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-7">  <div class="star-link"> <a href="{{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_link}}" target="_blank"><img src="{{asset('assets/images/icons/star-green-icon.svg')}}" alt=""> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_rating}} <span> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_trustpilot}} </span> | {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_name}}</a> </div>
				

                    <h1 class=" my-4 fs-68 fw-medium lh-1 text-m-40 text-capitalize">
                       <!--  {{optional(\App\Models\AboutBanner::first())->title}}-->
						 <span class="d-lg-block typewrite" data-period="1000" data-type='["Redefining", "Designing"]'>Redefining</span> communication channels for businesses
                    </h1>
                    <p class="fs-20 grey-1 mb-4">
                        {{optional(\App\Models\AboutBanner::first())->detail}}
                    </p>
<a href="/contact-us" class="btn btn-warning">Delve Deeper</a>

                </div>

                <div class="col-lg-5">
                    <img src="{{url(optional(\App\Models\AboutBanner::first())->image)}}" class="w-100" alt="{{optional(\App\Models\AboutBanner::first())->image_alt}}" title="{{optional(\App\Models\AboutBanner::first())->image_title}}">
                </div>
            </div>
        </div>
    </div>

    <section class="borderbottom" data-aos="fade-up">
        <div class="container">
            <div class="menu-overlay">
                <ul class="navmenu2 justify-content-start gap-lg-5 ">
                    <li>
                        <a href="{{url('about-us-company')}}" class="active">
                            Company <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a href="{{url('about-us-career')}}"> 
                            Career <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a href="{{url('about-us-resources')}}">
                            Resources <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </section>

    <section class="section-spacing " data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row align-items-center g-4">

                    <div class="col-lg-5">
                        <h4 class="fs-44 fw-medium text-m-32">{{$about_companypage_contents->title}}</h4>
                    </div>
                    <div class="col-lg-7">
                        <?php echo $about_companypage_contents->content; ?>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card bg-gradiant-2 rounded-24 p-lg-3 border-0 h-100">
                        <div class="card-body">
                            <div class="badge-only ">
                                <img src="{{url($about_companypage_contents->mission_icon)}}" alt="" />
                                {{$about_companypage_contents->mission_title}}
                            </div>
                            <h6 class="fs-3 my-3">{{$about_companypage_contents->mission_subtitle}}
                            </h6>
                            <p class="mb-0">{{$about_companypage_contents->mission_shortdesc}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-gradiant-2 rounded-24 p-lg-3 border-0 h-100">
                        <div class="card-body">
                            <div class="badge-only ">
                                <img src="{{url($about_companypage_contents->vission_icon)}}" alt="" />
                                {{$about_companypage_contents->vission_title}}
                            </div>
                            <h6 class="fs-3 my-3">{{$about_companypage_contents->vission_subtitle}}
                            </h6>
                            <p class="mb-0">{{$about_companypage_contents->vission_shortdesc}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-gradiant-2 rounded-24 p-lg-3 border-0 h-100">
                        <div class="card-body">
                            <div class="badge-only ">
                                <img src="{{url($about_companypage_contents->values_icon)}}" alt="" />
                                {{$about_companypage_contents->values_title}}
                            </div>
                            <h6 class="fs-3 my-3">{{$about_companypage_contents->values_subtitle}}</h6>
                            <p class="mb-0">{{$about_companypage_contents->values_shortdesc}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @if(!$about_companypage_worklife->isEmpty())
    <section class="section-spacing " data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <div class="row align-items-center g-4">
                    <div class="col-lg-12">
                        <div class="badge-only mb-3">
                            <img src="{{url($about_companypage_headings->aboutcompany_worklife_icon)}}" alt="" />
                            {{$about_companypage_headings->aboutcompany_worklife_title}}
                        </div>
                        <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_worklife_subtitle}}</h5>
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative toparrowspace">
                            <div class="swiper worklife-slider">
                                <div class="swiper-wrapper">
                                    @foreach($about_companypage_worklife as $worklife)
                                    <div class="swiper-slide">
                                        <!-- Button and Gallery 1 -->

                                        @php
                                         $fancyImages = DB::table('worklife_fancy_images')
                                                        ->where('worklife_id',$worklife->id)
                                                        ->where('status','Enable')
                                                        ->get();
                                        @endphp

                                        <div class="card case-card " >
                                            <div class="card-body">
                                                <img src="{{url($worklife->image)}}" class="w-100 @if(!$fancyImages->isEmpty()) showGallery @endif" @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif  alt="{{$worklife->image_alt}}" title="{{$worklife->image_tite}}" />
                                                <h6 @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif  class="fs-5 fw-bold @if(!$fancyImages->isEmpty()) showGallery @endif">{{$worklife->title}}</h6>
                                                <p>
                                                    {{$worklife->short_desc}}
                                                </p>
                                                
                                                <span @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif
                                                    class=" @if(!$fancyImages->isEmpty()) showGallery @endif d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold">{{$worklife->cta_name}}
                                                    <img src="{{url('/')}}/assets/images//icons/grey-arrow.svg" class="mb-0"
                                                        alt=""></span>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if(!$fancyImages->isEmpty())
                                    
                                     <div class="d-none">
                                    @foreach($fancyImages as $fancy)
                                      <a href="{{url($fancy->image)}}" data-gallery="gallery{{$worklife->id}}">
                                        <img src="{{url($fancy->image)}}" alt="{{$fancy->image_alt}}" /> 
                                      </a>
                                      @endforeach
                                      <!-- <a href="https://telspiel.vdpl.tech/uploads/1/2024-12/special_day2.jpg" data-gallery="gallery{{$worklife->id}}">
                                        <img src="https://telspiel.vdpl.tech/uploads/1/2024-12/special_day2.jpg" alt="Image 2" />
                                      </a> -->
                                    </div>

                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                       <!--  <div class="d-none">
                          <a href="{{url($worklife->image)}}" data-gallery="gallery1">
                            <img src="{{url($worklife->image)}}" alt="Image 1" /> 
                          </a>
                          <a href="{{url($worklife->image)}}" data-gallery="gallery1">
                            <img src="{{url($worklife->image)}}" alt="Image 2" />
                          </a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    
    @if(!$about_company_testimonials->isEmpty())
    <section class="section-spacing " data-aos="fade-up">
        <div class="container">
            <div class=" bg-gradiant-2 rounded-24 py-lg-5 p-4 pb-5">
                <div class="reduce-90px-width py-lg-4">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-12">
                            <div class="badge-only mb-3">
                                <img src="{{url($about_companypage_headings->aboutcompany_leadership_icon)}}" alt="" />
                                {{$about_companypage_headings->aboutcompany_leadership_title}}
                            </div>
                            <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_leadership_subtitle}}</h5>
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
    
    @if(!$about_company_locations->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-12">
                    <div class="badge-only mb-3">
                        <img src="{{url($about_companypage_headings->aboutcompany_presence_icon)}}" alt="" />
                        {{$about_companypage_headings->aboutcompany_presence_title}}
                    </div>
                    <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_presence_subtitle}}</h5>
                </div>
                <div class="col-lg-12">

                    <div class="bg-gradiant-2 rounded-24 p-lg-5  p-4 ">
                        <div class="mx-w1027 position-relative">
                        <div class="swiper locations-swiper">
                            <div class="swiper-wrapper" id="myTab" role="tablist">
                                @foreach($about_company_locations as $location)
                                <div class="swiper-slide" role="presentation">
                                    <div class="location-card {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#location_{{$location->id}}"
                                        aria-controls="location_{{$location->id}}" aria-selected="true">
                                        @if($location->icon !='')
                                        <img src="{{url($location->icon)}}" alt="">
                                        @else

                                        <img src="{{url('assets/images/location-image.png')}}" alt="">
                                        @endif
                                        <div class="">
                                            <h5>{{$location->city}}</h5>
                                            <p>{{$location->country}}</p>
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
    </section>
    
    <section class="section-spacing" data-aos="fade-up">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                @foreach($about_company_locations as $location)
                <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="location_{{$location->id}}" role="tabpanel"
                    aria-labelledby="location_{{$location->id}}-tab">
                    <div class="row">
                        <div class="col-lg-8 sectionIfreame">

                            <?php echo $location->iframe; ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="card bg-gradiant-2 border-0 p-3 h-100 rounded-24">
                                <div class="card-body">
                                    <h5 class="fw-bold">Address</h5>
                                    <address class="mb-2">{{$location->address}}</address>
                                    <br>
                                    <h5 class="fw-bold mb-0">Email</h5>
                                    <a href="mail:{{$location->email}}"
                                        class="mb-2 d-block">{{$location->email}}</a>
                                    <br>
                                    <h5 class="fw-bold mb-0">Phone Number</h5>
                                    <a href="tel:{{$location->phone_no}}" class="d-block">{{$location->phone_no}}</a>

                                    <ul class="social-icons-2">
                                        <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->twitter_x}}" target="_blank"><img src="{{url('/')}}/assets/images//icons/twitter.svg" alt=""></a></li>
                                        <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->insta}}" target="_blank"><img src="{{url('/')}}/assets/images//icons/instagram.svg" alt=""></a></li>
                                        <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->facebook}}" target="_blank"><img src="{{url('/')}}/assets/images//icons/facebook.svg" alt=""></a></li>
                                        <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->linkdin}}" target="_blank"><img src="{{url('/')}}/assets/images//icons/linkedin.svg" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>


        </div>



    </section>
    @endif
@endsection



@section('script_content')
<script>
  $('.sectionIfreame').find('iframe').addClass('rounded-24');
  $('.sectionIfreame').find('iframe').attr('width','100%');
  $('.sectionIfreame').find('iframe').attr('height','400');



  document.querySelectorAll('.showGallery').forEach(button => {
    button.addEventListener('click', (event) => {
      const galleryName = event.target.getAttribute('data-gallery');
      const galleryItems = Array.from(document.querySelectorAll(`a[data-gallery="${galleryName}"]`)).map(link => ({
        src: link.getAttribute('href'),
        thumb: link.querySelector('img') ? link.querySelector('img').getAttribute('src') : '',
        caption: link.querySelector('img') ? link.querySelector('img').alt : ''
      }));

      Fancybox.show(galleryItems, {
        thumbs: {
          autoStart: true
        }
      });
    });
  });
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
