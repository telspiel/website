@extends('layouts.app')

@section("htmlheader_title", $contact_us_page->meta_title)

@section("htmlheader_desc", $contact_us_page->meta_desc)

@section("htmlheader_keyword", $contact_us_page->meta_keyword)

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

    <div class="py-5 py-lg-0 bg-gradiant-1 borderbottom">
        <div class="container">
            <div class="row gx-lg-5 align-items-end">
                <div class="col-lg-7">

                    <h1 class=" my-4 fs-68 fw-medium lh-1 text-m-40">
                       {{$contact_us_page->heading}}
                    </h1>
                    <p class="fs-20 grey-1 mb-0 mb-lg-5">
                        {{$contact_us_page->short_desc}}
                    </p>


                </div>

                <div class="col-lg-5">
                    <div class="card form-design layoutshiftdown">
                        <div class="card-body">
                            <form method="POST" action="{{ route('contact_us.saveData') }}" id="myForm">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="yourname" name="name" placeholder="Your Name" autocomplete="off" value="{{ old('name') }}" required>
                                                <label for="yourname">Your Name</label>
                                               
                                            </div>
                                            <!-- @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                                <label for="email">Email address</label>
                                                
                                            </div>
                                            <!-- @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                                                <label for="phone">Phone</label>
                                                
                                            </div>
                                            <!-- @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="cname" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}" required>
                                                <label for="cname">Company Name</label>
                                               
                                            </div>
                                            <!-- @error('company_name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror -->
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Leave a comment here" id="message" style="height: 100px" required>{{ old('message') }}</textarea>
                                                <label for="message">Message / Query</label>
                                                
                                            </div>
                                            <!-- @error('message')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror -->
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

    <section class="section-spacing-contact">
        <section class="container">
            <div class="row gy-5">
                <div class="col-lg-8 sectionIfreame">
                    <!-- <iframe width="100%" class="rounded-24" height="400" frameborder="0" scrolling="no" marginheight="0"
                        marginwidth="0" id="gmap_canvas"
                        src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=808,%20Logix%20Office%20Tower,%20Sec%2032,%20Noida%20City%20Centre,%20Noida,%20201301,%20UP,%20India.%20noida+(808,%20Logix%20Office%20Tower,%20Sec%2032,%20Noida%20City%20Centre,%20Noida,%20201301,%20UP,%20India.)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> -->
                    <?php echo $contact_us_page->iframe; ?>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-gradiant-2 border-0 p-3 h-100 rounded-24">
                        <div class="card-body">
                            <h5 class="fw-bold">Address</h5>
                            <address class="mb-2">{{$contact_us_page->address}}</address>
                            <br>
                            <h5 class="fw-bold mb-0">Email</h5>
                            <a href="mail:{{$contact_us_page->email}}" class="mb-2 d-block">{{$contact_us_page->email}}</a>
                            <br>
                            <h5 class="fw-bold mb-0">Phone Number</h5>
                            <a href="tel:+91-120-4108800" class="d-block">{{$contact_us_page->phone_no}}</a>

                            <ul class="social-icons-2">
                                <li><a href="{{$contact_us_page->twitter_link}}"><img src="{{url('assets/images/icons/twitter.svg')}}" alt=""></a></li>
                                <li><a href="{{$contact_us_page->insta_link}}"><img src="{{url('assets/images/icons/instagram.svg')}}" alt=""></a></li>
                                <li><a href="{{$contact_us_page->facebook_link}}"><img src="{{url('assets/images/icons/facebook.svg')}}" alt=""></a></li>
                                <li><a href="{{$contact_us_page->linkdin_link}}"><img src="{{url('assets/images/icons/linkedin.svg')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </section>

@endsection

@section('script_content')

<script>
  $('.sectionIfreame').find('iframe').addClass('rounded-24');
  $('.sectionIfreame').find('iframe').attr('width','100%');
  $('.sectionIfreame').find('iframe').attr('height','400');
</script>

<script>

$(document).ready(function () {
    // Restrict phone input to digits only and max length of 15
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

    // Initialize form validation
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
        errorPlacement: function (error, element) {
            // Place error messages after the input group
            error.addClass('invalid-feedback');
            element.closest('.form-floating').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid').removeClass('is-valid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});

</script>

@endsection
