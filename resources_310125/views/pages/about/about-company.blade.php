@extends('layouts.app')

@section("htmlheader_title", $about_companypage_contents->meta_title)

@section("htmlheader_desc", $about_companypage_contents->meta_desc)

@section("htmlheader_keyword", $about_companypage_contents->meta_keyword) 

@section('content')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
/>
<div class="py-5 bg-gradiant-1 borderbottom">
  <div class="container">
    <div class="row gx-lg-5 align-items-center">
      <div class="col-lg-7">
        <div class="star-link aos-init aos-animate" data-aos="fade-right" data-aos-delay="200"> <a href="{{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_link}}" target="_blank"><img src="{{asset('assets/images/icons/star-green-icon.svg')}}" alt=""> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_rating}} <span> {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_trustpilot}} </span> | {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_name}}</a> </div>
        <h1 class=" my-4 fs-68 fw-medium lh-1 text-m-40 text-capitalize aos-init aos-animate" data-aos="fade-right" data-aos-delay="200"> 
          <!--  {{optional(\App\Models\AboutBanner::first())->title}}--> 
          <span class="d-lg-block typewrite" data-period="1000" data-type='["Redefining", "Designing"]'>Redefining</span> communication channels for businesses </h1>
        <p class="fs-20 grey-1 mb-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200"> {{optional(\App\Models\AboutBanner::first())->detail}} </p>
        <a href="/contact-us" class="btn btn-warning aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">Delve Deeper</a> </div>
      <div class="col-lg-5"> <img src="{{url(optional(\App\Models\AboutBanner::first())->image)}}" class="w-100 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200" alt="{{optional(\App\Models\AboutBanner::first())->image_alt}}" title="{{optional(\App\Models\AboutBanner::first())->image_title}}"> </div>
    </div>
  </div>
</div>
<section class="borderbottom" data-aos="fade-up">
  <div class="container">
    <div class="menu-overlay">
      <ul class="navmenu2 justify-content-start gap-lg-5 ">
        <li> <a href="{{url('about-us-company')}}" class="active"> Company <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
        <li> <a href="{{url('about-us-career')}}"> Career <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
        <li> <a href="{{url('about-us-resources')}}"> Resources <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt=""> </a> </li>
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
        <div class="col-lg-7"> <?php echo $about_companypage_contents->content; ?> </div>
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
            <div class="badge-only "> <img src="{{url($about_companypage_contents->mission_icon)}}" alt="" /> {{$about_companypage_contents->mission_title}} </div>
            <h6 class="fs-3 my-3">{{$about_companypage_contents->mission_subtitle}} </h6>
            <p class="mb-0">{{$about_companypage_contents->mission_shortdesc}} </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card bg-gradiant-2 rounded-24 p-lg-3 border-0 h-100">
          <div class="card-body">
            <div class="badge-only "> <img src="{{url($about_companypage_contents->vission_icon)}}" alt="" /> {{$about_companypage_contents->vission_title}} </div>
            <h6 class="fs-3 my-3">{{$about_companypage_contents->vission_subtitle}} </h6>
            <p class="mb-0">{{$about_companypage_contents->vission_shortdesc}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card bg-gradiant-2 rounded-24 p-lg-3 border-0 h-100">
          <div class="card-body">
            <div class="badge-only "> <img src="{{url($about_companypage_contents->values_icon)}}" alt="" /> {{$about_companypage_contents->values_title}} </div>
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
          <div class="badge-only mb-3"> <img src="{{url($about_companypage_headings->aboutcompany_worklife_icon)}}" alt="" /> {{$about_companypage_headings->aboutcompany_worklife_title}} </div>
          <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_worklife_subtitle}}</h5>
        </div>
        <div class="col-lg-12">
          <div class="position-relative toparrowspace">
            <div class="swiper worklife-slider">
              <div class="swiper-wrapper"> @foreach($about_companypage_worklife as $worklife)
                <div class="swiper-slide"> 
                  <!-- Button and Gallery 1 --> 
                  
                  @php
                  $fancyImages = DB::table('worklife_fancy_images')
                  ->where('worklife_id',$worklife->id)
                  ->where('status','Enable')
                  ->get();
                  @endphp
                  <div role="button" class="card case-card " >
                    <div class="card-body"> <img src="{{url($worklife->image)}}" class="w-100 @if(!$fancyImages->isEmpty()) showGallery @endif" @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif  alt="{{$worklife->image_alt}}" title="{{$worklife->image_tite}}" />
                      <h6 @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif  class="fs-5 fw-bold @if(!$fancyImages->isEmpty()) showGallery @endif">{{$worklife->title}}</h6>
                      <p> {{$worklife->short_desc}} </p>
                      <span @if(!$fancyImages->isEmpty()) data-gallery="gallery{{$worklife->id}}" @endif
                      class=" @if(!$fancyImages->isEmpty()) showGallery @endif d-flex align-items-center gap-2 pt-2 grey-1 fw-semibold">{{$worklife->cta_name}} <img src="{{url('/')}}/assets/images//icons/grey-arrow.svg" class="mb-0"
                                                        alt=""></span> </div>
                  </div>
                </div>
                @if(!$fancyImages->isEmpty())
                <div class="d-none"> @foreach($fancyImages as $fancy) <a href="{{url($fancy->image)}}" data-gallery="gallery{{$worklife->id}}"> <img src="{{url($fancy->image)}}" alt="{{$fancy->image_alt}}" /> </a> @endforeach 
                  <!-- <a href="https://telspiel.vdpl.tech/uploads/1/2024-12/special_day2.jpg" data-gallery="gallery{{$worklife->id}}">
                                        <img src="https://telspiel.vdpl.tech/uploads/1/2024-12/special_day2.jpg" alt="Image 2" />
                                      </a> --> 
                </div>
                @endif
                @endforeach </div>
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
                <div class="badge-only mb-3"> <img src="{{url($about_companypage_headings->aboutcompany_leadership_icon)}}" alt="" /> {{$about_companypage_headings->aboutcompany_leadership_title}} </div>
                <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_leadership_subtitle}}</h5>
              </div>
          <div class="col-lg-12">
                <div class="position-relative ">
              <div class="swiper leadership-slider pb-4">
                    <div class="swiper-wrapper"> @foreach($about_company_testimonials as $testimonial)
                  <div class="swiper-slide">
                        <div class="row gx-lg-5  gy-4">
                      <div class="col-lg-5"> <img src="{{url($testimonial->image)}}" class="w-100" alt="{{$testimonial->image_alt}}" title="{{$testimonial->image_title}}" /> </div>
                      <div class="col-lg-7">
                            <p class="fw-light mb-2 desc">{{$testimonial->short_desc}}</p>
                            <div class="case-btm">
                          <p class="fs-3 mb-0 fw-semibold"> {{$testimonial->name}} </p>
                          <p class="fs-5 mb-1">{{$testimonial->designation}}</p>
                          <ul class="social-bx">
                                <li><a href="{{$testimonial->linkedin_url}}" target="_blank">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="28.001" height="28" viewBox="0 0 28.001 28">
                                  <path d="M6.268,28H.463V9.307H6.268ZM3.362,6.756A3.378,3.378,0,1,1,6.724,3.363,3.39,3.39,0,0,1,3.362,6.756ZM27.994,28H22.2V18.9c0-2.169-.044-4.95-3.018-4.95-3.018,0-3.481,2.356-3.481,4.794V28H9.9V9.307h5.568v2.55h.081a6.1,6.1,0,0,1,5.493-3.019c5.875,0,6.955,3.869,6.955,8.894V28Z" transform="translate(0 0)" fill="#8b9da7"></path>
                                </svg>
                                  </a></li>
                              </ul>
                        </div>
                          </div>
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
    
    @if(!$about_company_locations->isEmpty())
    <section class="section-spacing" data-aos="fade-up">
  <div class="container">
        <div class="row gy-4 justify-content-center">
      <div class="col-lg-12">
            <div class="badge-only mb-3"> <img src="{{url($about_companypage_headings->aboutcompany_presence_icon)}}" alt="" /> {{$about_companypage_headings->aboutcompany_presence_title}} </div>
            <h5 class="fs-44 fw-medium text-m-32">{{$about_companypage_headings->aboutcompany_presence_subtitle}}</h5>
          </div>
      <div class="col-lg-12">
            <div class="bg-gradiant-2 rounded-24 p-lg-5  p-4 ">
          <div class="mx-w1027 position-relative">
                <div class="swiper locations-swiper">
              <div class="swiper-wrapper" id="myTab" role="tablist"> @foreach($about_company_locations as $location)
                    <div class="swiper-slide" role="presentation">
                  <div class="location-card {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#location_{{$location->id}}"
                                        aria-controls="location_{{$location->id}}" aria-selected="true"> @if($location->icon !='') <img src="{{url($location->icon)}}" alt=""> @else <img src="{{url('assets/images/location-image.png')}}" alt=""> @endif
                        <div class="">
                      <h5>{{$location->city}}</h5>
                      <p>{{$location->country}}</p>
                    </div>
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
</section>
    <section class="section-spacing" data-aos="fade-up">
  <div class="container">
        <div class="tab-content" id="myTabContent"> @foreach($about_company_locations as $location)
      <div class="tab-pane fade show {{ $loop->first ? 'active' : '' }}" id="location_{{$location->id}}" role="tabpanel"
                    aria-labelledby="location_{{$location->id}}-tab">
            <div class="row">
          <div class="col-lg-8 sectionIfreame"> <?php echo $location->iframe; ?> </div>
          <div class="col-lg-4">
                <div class="card bg-gradiant-2 border-0 p-3 h-100 rounded-24">
              <div class="card-body">
                    <h5 class="fw-bold">Address</h5>
                    <address class="mb-2">
                {{$location->address}}
                </address>
                    <br>
                    <h5 class="fw-bold mb-0">Email</h5>
                    <a href="mail:{{$location->email}}"
                                        class="mb-2 d-block">{{$location->email}}</a> <br>
                    <h5 class="fw-bold mb-0">Phone Number</h5>
                    <a href="tel:{{$location->phone_no}}" class="d-block">{{$location->phone_no}}</a>
                    <ul class="social-icons-2">
                  <!-- <li><a href="" target="_blank"><img src="{{url('/')}}/assets/images//icons/twitter.svg" alt=""></a></li>
                  <li><a href="" target="_blank"><img src="{{url('/')}}/assets/images//icons/instagram.svg" alt=""></a></li>
                  <li><a href="" target="_blank"><img src="{{url('/')}}/assets/images//icons/facebook.svg" alt=""></a></li>
                  <li><a href="" target="_blank"><img src="{{url('/')}}/assets/images//icons/linkedin.svg" alt=""></a></li>
                  <li><a href="" target="_blank"><img src="{{url('/')}}/assets/images//icons/youtube.svg" alt=""></a></li>
                -->


                  <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->twitter_x}}" target="_blank">
              
              <svg xmlns="http://www.w3.org/2000/svg" width="30.975" height="28" viewBox="0 0 30.975 28"><path d="M26.277,3.375h4.752L20.65,15.235l12.21,16.14H23.3L15.81,21.588,7.249,31.375H2.49l11.1-12.687L1.884,3.375h9.8l6.764,8.945Zm-1.669,25.16h2.632L10.251,6.067H7.424Z" transform="translate(-1.884 -3.375)" fill="#8b9da7"/></svg>
                          </a></li>
                          <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->insta}}" target="_blank">
                            
              <svg xmlns="http://www.w3.org/2000/svg" width="28.006" height="28" viewBox="0 0 28.006 28"><path d="M14,9.059a7.179,7.179,0,1,0,7.179,7.179A7.167,7.167,0,0,0,14,9.059ZM14,20.9a4.667,4.667,0,1,1,4.667-4.667A4.676,4.676,0,0,1,14,20.9Zm9.147-12.14a1.674,1.674,0,1,1-1.674-1.674A1.671,1.671,0,0,1,23.148,8.765Zm4.755,1.7A8.286,8.286,0,0,0,25.641,4.6a8.341,8.341,0,0,0-5.867-2.262c-2.312-.131-9.241-.131-11.552,0A8.329,8.329,0,0,0,2.355,4.592,8.314,8.314,0,0,0,.093,10.458c-.131,2.312-.131,9.241,0,11.552a8.286,8.286,0,0,0,2.262,5.867,8.351,8.351,0,0,0,5.867,2.262c2.312.131,9.241.131,11.552,0a8.286,8.286,0,0,0,5.867-2.262A8.341,8.341,0,0,0,27.9,22.011c.131-2.312.131-9.234,0-11.546ZM24.916,24.491a4.725,4.725,0,0,1-2.662,2.662c-1.843.731-6.217.562-8.253.562s-6.417.162-8.253-.562a4.725,4.725,0,0,1-2.662-2.662c-.731-1.843-.562-6.217-.562-8.253s-.162-6.417.562-8.253A4.725,4.725,0,0,1,5.747,5.323C7.591,4.592,11.964,4.76,14,4.76s6.417-.162,8.253.562a4.725,4.725,0,0,1,2.662,2.662c.731,1.843.562,6.217.562,8.253S25.647,22.654,24.916,24.491Z" transform="translate(0.005 -2.238)" fill="#8b9da7"/></svg>
                          </a></li>
                          <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->facebook}}" target="_blank">
                          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"><path d="M25,2.25H3a3,3,0,0,0-3,3v22a3,3,0,0,0,3,3h8.578V20.731H7.641V16.25h3.938V12.835c0-3.884,2.313-6.03,5.854-6.03a23.854,23.854,0,0,1,3.47.3V10.92H18.948a2.24,2.24,0,0,0-2.526,2.421V16.25h4.3l-.687,4.481H16.422V30.25H25a3,3,0,0,0,3-3v-22a3,3,0,0,0-3-3Z" transform="translate(0 -2.25)" fill="#8b9da7"/></svg></a></li>
                          <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->linkdin}}" target="_blank">
                            
              <svg xmlns="http://www.w3.org/2000/svg" width="28.001" height="28" viewBox="0 0 28.001 28"><path d="M6.268,28H.463V9.307H6.268ZM3.362,6.756A3.378,3.378,0,1,1,6.724,3.363,3.39,3.39,0,0,1,3.362,6.756ZM27.994,28H22.2V18.9c0-2.169-.044-4.95-3.018-4.95-3.018,0-3.481,2.356-3.481,4.794V28H9.9V9.307h5.568v2.55h.081a6.1,6.1,0,0,1,5.493-3.019c5.875,0,6.955,3.869,6.955,8.894V28Z" transform="translate(0 0)" fill="#8b9da7"/></svg>
                          </a></li>
                          <li><a href="{{optional(\App\Models\AboutCompanySocialLink::first())->youtube}}" target="_blank">
                            
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="42px" height="28px" viewBox="0 0 42 28" version="1.1">
              <g id="surface1">
              <path style=" stroke:none;fill-rule:nonzero;fill:rgb(54.509807%,61.56863%,65.490198%);fill-opacity:1;" d="M 41.109375 4.394531 C 40.875 3.542969 40.410156 2.773438 39.769531 2.167969 C 39.113281 1.539062 38.3125 1.097656 37.425781 0.875 C 34.148438 0 20.988281 0 20.988281 0 C 15.507812 -0.0585938 10.019531 0.222656 4.574219 0.828125 C 3.699219 1.074219 2.898438 1.527344 2.230469 2.15625 C 1.589844 2.761719 1.125 3.53125 0.867188 4.382812 C 0.285156 7.554688 -0.00390625 10.769531 0.015625 14 C -0.00390625 17.21875 0.285156 20.433594 0.867188 23.605469 C 1.113281 24.457031 1.578125 25.214844 2.21875 25.820312 C 2.886719 26.4375 3.6875 26.894531 4.5625 27.113281 C 7.886719 27.976562 20.976562 27.976562 20.976562 27.976562 C 26.46875 28.046875 31.957031 27.765625 37.414062 27.160156 C 38.289062 26.925781 39.101562 26.484375 39.757812 25.855469 C 40.398438 25.25 40.851562 24.480469 41.097656 23.628906 C 41.703125 20.457031 41.996094 17.242188 41.972656 14.023438 C 42.015625 10.78125 41.726562 7.554688 41.097656 4.371094 Z M 16.804688 19.980469 L 16.804688 8.007812 L 27.75 13.988281 Z M 16.804688 19.980469 "/>
              </g>
              </svg>
              
                          </a></li>
               
                </ul>
                  </div>
            </div>
              </div>
        </div>
          </div>
      @endforeach </div>
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