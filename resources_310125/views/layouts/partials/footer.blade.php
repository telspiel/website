@php
$footer_menu_categories = DB::table('footer_menu_categories')
                ->select('footer_menu_categories.*')
                ->where('status','Enable')
                ->orderBy('position','ASC')
                ->get();

@endphp
<footer class="footer">
    <div class="container">
      <div class="row gy-lg-5 gy-4">

        <div class="col-lg-4">
          <img src="{{url(optional(\App\Models\Footer::first())->logo)}}" class="mb-4" alt="{{optional(\App\Models\Footer::first())->logo_alt}}" title="{{optional(\App\Models\Footer::first())->logo_title}}">
          <p class="grey-1">{{optional(\App\Models\Footer::first())->short_content}}</p>
        </div>
        <div class="col-lg-8">
          <div class="row gy-4">
            @if(!$footer_menu_categories->isEmpty())
            @foreach($footer_menu_categories as $category)
            <div class="col-lg-3">
              <h5 class="fs-6 grey-1 mb-3 fw-normal">{{$category->name}}</h5>
              @php
              $footer_sub_menus = DB::table('footer_sub_menus')
                              ->select('footer_sub_menus.*')
                              ->where('cat_id',$category->id)
                              ->where('status','Enable')
                              ->orderBy('position','ASC')
                              ->get();

              @endphp
              @if(!$footer_sub_menus->isEmpty())
              <ul class="f-links">
                @foreach($footer_sub_menus as $menu)
                <li><a href="{{$menu->slug}}">{{$menu->name}}</a></li>
                @endforeach
              </ul>
              @endif
            </div>
            @endforeach
            @endif

          </div>
        </div>

        <div class="col-lg-12 ">
          <ul class="footer-social">
            <li><a href="{{optional(\App\Models\Footer::first())->twitter_x}}" target="_blank">
              
<svg xmlns="http://www.w3.org/2000/svg" width="30.975" height="28" viewBox="0 0 30.975 28"><path d="M26.277,3.375h4.752L20.65,15.235l12.21,16.14H23.3L15.81,21.588,7.249,31.375H2.49l11.1-12.687L1.884,3.375h9.8l6.764,8.945Zm-1.669,25.16h2.632L10.251,6.067H7.424Z" transform="translate(-1.884 -3.375)" fill="#8b9da7"/></svg>
            </a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->insta}}" target="_blank">
              
<svg xmlns="http://www.w3.org/2000/svg" width="28.006" height="28" viewBox="0 0 28.006 28"><path d="M14,9.059a7.179,7.179,0,1,0,7.179,7.179A7.167,7.167,0,0,0,14,9.059ZM14,20.9a4.667,4.667,0,1,1,4.667-4.667A4.676,4.676,0,0,1,14,20.9Zm9.147-12.14a1.674,1.674,0,1,1-1.674-1.674A1.671,1.671,0,0,1,23.148,8.765Zm4.755,1.7A8.286,8.286,0,0,0,25.641,4.6a8.341,8.341,0,0,0-5.867-2.262c-2.312-.131-9.241-.131-11.552,0A8.329,8.329,0,0,0,2.355,4.592,8.314,8.314,0,0,0,.093,10.458c-.131,2.312-.131,9.241,0,11.552a8.286,8.286,0,0,0,2.262,5.867,8.351,8.351,0,0,0,5.867,2.262c2.312.131,9.241.131,11.552,0a8.286,8.286,0,0,0,5.867-2.262A8.341,8.341,0,0,0,27.9,22.011c.131-2.312.131-9.234,0-11.546ZM24.916,24.491a4.725,4.725,0,0,1-2.662,2.662c-1.843.731-6.217.562-8.253.562s-6.417.162-8.253-.562a4.725,4.725,0,0,1-2.662-2.662c-.731-1.843-.562-6.217-.562-8.253s-.162-6.417.562-8.253A4.725,4.725,0,0,1,5.747,5.323C7.591,4.592,11.964,4.76,14,4.76s6.417-.162,8.253.562a4.725,4.725,0,0,1,2.662,2.662c.731,1.843.562,6.217.562,8.253S25.647,22.654,24.916,24.491Z" transform="translate(0.005 -2.238)" fill="#8b9da7"/></svg>
            </a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->facebook}}" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"><path d="M25,2.25H3a3,3,0,0,0-3,3v22a3,3,0,0,0,3,3h8.578V20.731H7.641V16.25h3.938V12.835c0-3.884,2.313-6.03,5.854-6.03a23.854,23.854,0,0,1,3.47.3V10.92H18.948a2.24,2.24,0,0,0-2.526,2.421V16.25h4.3l-.687,4.481H16.422V30.25H25a3,3,0,0,0,3-3v-22a3,3,0,0,0-3-3Z" transform="translate(0 -2.25)" fill="#8b9da7"/></svg></a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->linkdin}}" target="_blank">
              
<svg xmlns="http://www.w3.org/2000/svg" width="28.001" height="28" viewBox="0 0 28.001 28"><path d="M6.268,28H.463V9.307H6.268ZM3.362,6.756A3.378,3.378,0,1,1,6.724,3.363,3.39,3.39,0,0,1,3.362,6.756ZM27.994,28H22.2V18.9c0-2.169-.044-4.95-3.018-4.95-3.018,0-3.481,2.356-3.481,4.794V28H9.9V9.307h5.568v2.55h.081a6.1,6.1,0,0,1,5.493-3.019c5.875,0,6.955,3.869,6.955,8.894V28Z" transform="translate(0 0)" fill="#8b9da7"/></svg>
            </a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->youtube}}" target="_blank">
              
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
</footer>
<div class="container py-4 py-lg-5">
  <div class="row gy-3">
    <div class="col-lg-4">
      <p class="mb-0 grey-1">{{optional(\App\Models\Footer::first())->copyright_text}}</p>
    </div>
    <div class="col-lg-3">
      <a href="mail:{{optional(\App\Models\Footer::first())->email}}" class="text-secondary d-flex gap-1 align-items-center"><img width="15" src="{{asset('assets/images/icons/mail.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->email}}</a>
    </div>
    <div class="col-lg-2">
      <a href="tel:{{optional(\App\Models\Footer::first())->phone}}" class="text-secondary d-flex gap-1 align-items-center"><img width="15" src="{{asset('assets/images/icons/telephone.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->phone}}</a>
    </div>
    <div class="col-lg-3">
      <address class="mb-0 text-secondary d-flex gap-1 align-items-start">
       <img src="{{asset('assets/images/icons/pin.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->address}}
      </address>
    </div>
  </div>
</div>

<!-- <p class="text-center fs-12 grey-4 p-2 mb-0">
  Designed by Maaztr Studios
</p> -->