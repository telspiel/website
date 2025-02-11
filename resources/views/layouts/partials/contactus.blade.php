<style>
    .contactform form input{color: #fff;}
</style>
<section class="section-spacing " >
        <div class="container">
            <div class="contactform">
                <div class="badge-only mb-4 bg-transparent text-white light-border aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
                    <img src="{{asset('assets/images/icons/plain-yellow-icon.svg')}}" alt="" />
                    Contact Us
                </div> 
                <h2 class="fs-1 fw-medium text-white aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Ready for an IT Revolution?</h2>

                <form method="POST" action="{{ route('bottom_contact.store') }}" id="myContactForm" class="row gy-4">
                    @csrf
                    <div class="col-lg-4">
                        <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required />
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required />
                    </div>
                    <div class="col-lg-4">
                        <input type="text" name="ph_no" placeholder="+91 - Phone No." value="{{ old('ph_no') }}" class="form-control ph_no @error('ph_no') is-invalid @enderror" required />
                    </div>

                    <div class="col-lg-12">
                        <button class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>

        </div>


    </section>
