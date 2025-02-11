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
            <li><a href="{{optional(\App\Models\Footer::first())->twitter_x}}" target="_blank"><img src="{{asset('assets/images/icons/twitter.svg')}}" alt=""></a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->insta}}" target="_blank"><img src="{{asset('assets/images/icons/instagram.svg')}}" alt=""></a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->facebook}}" target="_blank"><img src="{{asset('assets/images/icons/facebook.svg')}}" alt=""></a></li>
            <li><a href="{{optional(\App\Models\Footer::first())->linkdin}}" target="_blank"><img src="{{asset('assets/images/icons/linkedin.svg')}}" alt=""></a></li>
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
    <div class="col-lg-2">
      <a href="mail:{{optional(\App\Models\Footer::first())->email}}" class="text-secondary d-flex gap-1 align-items-center"><img width="15" src="{{asset('assets/images/icons/mail.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->email}}</a>
    </div>
    <div class="col-lg-2">
      <a href="tel:{{optional(\App\Models\Footer::first())->phone}}" class="text-secondary d-flex gap-1 align-items-center"><img width="15" src="{{asset('assets/images/icons/telephone.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->phone}}</a>
    </div>
    <div class="col-lg-4">
      <address class="mb-0 text-secondary d-flex gap-1 align-items-start">
       <img src="{{asset('assets/images/icons/pin.svg')}}" alt=""> {{optional(\App\Models\Footer::first())->address}}
      </address>
    </div>
  </div>
</div>

<!-- <p class="text-center fs-12 grey-4 p-2 mb-0">
  Designed by Maaztr Studios
</p> -->