   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      {{-- <div class="logo-icon">
        <img src="{{ asset('website/assets/images/Tespiel_Logo.png')}}" class="logo-img" alt="">
      </div> --}}
      <div class="logo-name flex-grow-1">
        <img src="{{ asset('website/assets/images/Tespiel_Logo.png')}}" width="100%" height="100%" alt="">
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav" class="has-arrow">
          <li class="@if (Route::is('admin.dashboard')) mm-active @endif">
            <a href="/admin/dashboard" >
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>

          </li>
          <li class="@if (Route::is('admin.clients')) mm-active @endif">
            <a href="{{ route('admin.clients') }}">
              <div class="parent-icon"><i class="material-icons-outlined">group</i>
              </div>
              <div class="menu-title">Clients</div>
            </a>

          </li>
         </ul>
        <!--end navigation-->
    </div>
  </aside>
<!--end sidebar-->
