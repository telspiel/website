@extends('layouts.app')

@section("htmlheader_title", $about_carrierpage_headings->meta_title)

@section("htmlheader_desc", $about_carrierpage_headings->meta_desc)

@section("htmlheader_keyword", $about_carrierpage_headings->meta_keyword)

@section('content')
<style>
    .is-invalid {
        border-color: #dc3545;
    }
    .invalid-feedback {
        color: #dc3545;
        display: block;
    }
</style>
    
    <div class="py-5 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-7">

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
                        <a href="{{url('about-us-company')}}" >
                            Company <img src="{{url('/')}}/assets/images//icons/right-icon.svg" alt="">
                        </a>
                    </li>

                    <li>
                        <a href="{{url('about-us-career')}}" class="active">
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
    <section class="my-5" id="aboutFilterSection" data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">
                <form action="{{ url('about-us-career') }}#aboutFilterSection" method="GET" id="job-filter-form">
                <div class="row gy-3">
                    <div class="col-lg-12">
                        <h5 class="fw-bold mb-0 fs-5">{{$about_carrierpage_headings->filter_title}} </h5>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select filterData" name="jobs_filter" id="industry-filter" data-placeholder="Job Title">
                            <option></option>
                            @if(!$about_carrierpage_jobs->isEmpty())
                            @foreach($about_carrierpage_jobs as $job)
                            <option value="{{$job->id}}"  {{ request('jobs_filter') == $job->id ? 'selected' : '' }}>{{$job->job_title}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <select class="form-select filterData" name="location_filter" id="products-filter" data-placeholder="Location">
                            <option></option>
                            @if(!$about_carrierpage_locations->isEmpty())
                            @foreach($about_carrierpage_locations as $location)
                            <option value="{{$location->id}}"  {{ request('location_filter') == $location->id ? 'selected' : '' }}>{{$location->location}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                </form>
            </div>

        </div>

    </section>

    @if(!$about_carrier_jobsDetails->isEmpty())
    <section class="section-spacing mt-5 " data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">

                <div class="accordion career-accor" id="accordionExample">
                    @foreach($about_carrier_jobsDetails as $index => $details)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <div type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index + 1 }}"
                                aria-expanded="true" aria-controls="collapse{{ $index + 1 }}">
                                <div class="accor-head">
                                    <h5 class="fs-5 fw-bold mb-0">{{$details->title}}</h5> <a href="" class="view-detail">View
                                        Details</a>

                                        <span class="{{$details->job_status == 'Active' ? 'active-crl' : 'paused-crl'}}"> {{$details->job_status}}</span>

                                    <span class="address"><img src="{{url('assets/images/icons/pin.svg')}}" alt=""> {{optional(\App\Models\JobLocation::where('id',$details->location_id)->first())->location}}</span>
                                    <!-- <a href="#contactForm" class="apply" data-id="{{$details->id}}">Apply <img src="{{url('assets/images/icons/grey-arrow.svg')}}"
                                            alt=""></a> -->
                                </div>
                            </div>
                        </h2>
                        <div id="collapse{{ $index + 1 }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body sectionUl">
                                <p class="fw-medium"><strong>Job Description</strong></p>
                                <?php echo $details->descriptions; ?>
                                <a href="#contactForm" class="applyBtn" data-id="{{$details->id}}">Apply <img src="{{url('assets/images/icons/grey-arrow.svg')}}"
                                            alt=""></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    @else
    <section class="section-spacing mt-5 " data-aos="fade-up">
        <div class="container">
            <div class="reduce-90px-width">

                <p>No jobs found..</p>
            </div>

        </div>
    </section>
    @endif

    @if(!$about_carrierpage_testimonials->isEmpty())
    <section class="section-spacing " data-aos="fade-up">
        <div class="container">
            <div class=" bg-gradiant-2 rounded-24 py-lg-5 p-4 pb-5">
                <div class="reduce-90px-width py-lg-4">
                    <div class="row align-items-center g-4">
                        <div class="col-lg-12">
							
                        <div class="badge-only mb-3">
                            <img src="{{url($about_carrierpage_headings->testimonial_icon)}}" alt="" />
                            {{$about_carrierpage_headings->testimonial_title}}
                        </div>
						
                        <h5 class="fs-44 fw-medium text-m-32">{{$about_carrierpage_headings->testimonial_subtitle}}</h5>
								<div class="star-link mb-3"> <a href="https://www.ambitionbox.com/overview/telspiel-overview" target="_blank"><img src="{{asset('assets/images/icons/star-green-icon.svg')}}" alt=""> 4.4 on <span> Ambition Box </span> | {{optional(\App\Models\SolutionPageHeading::first())->our_imapact_cta_name}}</a> </div>
                    </div>
                        <div class="col-lg-12">
                            <div class="position-relative ">


                                <div class="swiper leadership-slider pb-4">
                                    <div class="swiper-wrapper">
                                        @foreach($about_carrierpage_testimonials as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="row gx-lg-5 align-items-center gy-4">
                                                <div class="col-lg-5">
                                                    <img src="{{url($testimonial->image)}}" class="w-100" alt="{{$testimonial->image_alt}}" title="{{$testimonial->image_title}}" />
                                                </div>
                                                <div class="col-lg-7">
                                                    <p class="fs-6 fw-light mb-5">{{$testimonial->short_desc}}</p>
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

    <div class="section-spacing " id="contactForm" data-aos="fade-up">
        <div class="container">
            
                <div class="row gx-lg-5 gy-5">
                    <div class="col-lg-6">
                      <div class="card bg-gradiant-2 rounded-24 h-100 border-0 p-lg-5 p-2">
                        <div class="card-body">
                        <div class="badge-only mb-3">
                            <img src="{{url($about_carrierpage_headings->contact_icon)}}" alt="" />
                            {{$about_carrierpage_headings->contact_title}}
                        </div>
                        <h5 class="fs-44 fw-medium text-m-32">{{$about_carrierpage_headings->contact_subtitle}}</h5>

                        <h5 class="fw-bold mt-4">Address</h5>
                            <address class="mb-2">{{optional(\App\Models\ContactAddress::first())->address}}</address>
                            <br>
                            <h5 class="fw-bold mb-0">Email</h5>
                            <a href="mail:{{optional(\App\Models\ContactAddress::first())->email}}" class="mb-2 d-block text-success">{{optional(\App\Models\ContactAddress::first())->email}}</a>
                            <br>
                            <h5 class="fw-bold mb-0">Phone Number</h5>
                            <a href="tel:{{optional(\App\Models\ContactAddress::first())->phone_no}}" class="d-block text-secondary">{{optional(\App\Models\ContactAddress::first())->phone_no}}</a>
                        </div>
                      </div>
                   
                     

                    </div>

                    <div class="col-lg-6">
                        <div class="card form-design ms-lg-5">
                            <div class="card-body">
                                <form method="POST" action="{{ route('contact.store') }}" id="myForm">
                                    @csrf
                                    <input type="hidden" name="job_id" class="jobId" value="">
                                    <div class="row gy-4">
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="yourname" name="name" placeholder="Your Name" autocomplete="off" value="{{ old('name') }}" required>
                                                <label for="yourname">Your Name</label>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                                <label for="email">Email address</label>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                                                <label for="phone">Phone</label>
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="cname" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" required>
                                                <label for="cname">Company Name</label>
                                                @error('company_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="file" class="form-control @error('file_cv') is-invalid @enderror" id="file_cv" name="file_cv" placeholder="Resume/CV" value="{{ old('file_cv') }}" required application/pdf>
                                                <label for="file_cv">Resume/CV</label>
                                                @error('file_cv')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> -->
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Leave a comment here" id="message" style="height: 100px" required>{{ old('message') }}</textarea>
                                                <label for="message">Message / Query</label>
                                                @error('message')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-warning w-100" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
@endsection



@section('script_content')
<script>
  $('.sectionUl').find('ul').addClass('list-check mt-3');

  $('.filterData').on('change', function() {
        
        $('#job-filter-form').submit();
    });
  $(document).on('click','.applyBtn', function(){
        var jobId = $(this).attr('data-id');
        $('.jobId').val(jobId);
  });
</script>



<script>
$(document).ready(function () {
    $('#phone').on('keypress', function (e) {
        if (e.which < 48 || e.which > 57) {
            e.preventDefault(); // Stop the key press if it is not a digit
        }

        // Get the current value of the input field
        var currentValue = $(this).val();

        // Check if the current value length is 15 or more
        if (currentValue.length >= 15) {
            e.preventDefault(); // Prevent additional input if the length is 15 or more
        }
    });
    $("#myForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10
            },
            company_name: {
                required: true,
                minlength: 3
            },
            message: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must be at least 2 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            phone: {
                required: "Please enter phone",
                minlength: "Your phone must be at least 10 digits long"
            },
            company_name: {
                required: "Please enter your company",
                minlength: "Your company name must be at least 3 characters long"
            },
            message: {
                required: "Please enter your message",
                minlength: "Your message must be at least 5 characters long"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
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
