<script type="text/javascript">

    var APP_URL = "{!! url('/').'/' !!}"

</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script> 
  <script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendors/gsap/gsap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/gsap/ScrollTrigger.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/vendors/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="assets/vendors/ticker/ticker.js"></script>
  <script src="{{asset('assets/js/myscript.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/animation.js')}}"></script>
  

  @if(session('success'))
    <script>
        iziToast.show({
            title: 'Success',
            message: "{{ session('success') }}",
            timeout: 5000,
            position: 'bottomRight',
            titleColor: '#FFFFFF',
            backgroundColor: '#5eaf35f5',
            messageColor: '#FFFFFF'
          });
          
    </script>
@endif
@if(session('error'))
    <script>
        iziToast.show({
            title: 'Error',
            message: "{{ session('error') }}",
            timeout: 5000,
            position: 'bottomRight',
            titleColor: '#FFFFFF',
            backgroundColor: '#FF4136',
            messageColor: '#FFFFFF'
          });
          
    </script>
@endif

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>


  <script>
     AOS.init();



     
     $(".speed-test").each(function(){$(this).ticker({speed:$(this).data("speed")||60})});




$(document).ready(function () {
    $('.ph_no').on('keypress', function (e) {
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
    $("#myContactForm").validate({

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
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
</script>

  @yield('script_content')