   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
       <div class="sidebar-header">
           {{-- <div class="logo-icon">
        <img src="{{ asset('website/assets/images/Tespiel_Logo.png')}}" class="logo-img" alt="">
      </div> --}}
           <div class="logo-name flex-grow-1">
               <a href="{{ route('admin.dashboard') }}"> <img src="{{ asset('website/assets/images/Tespiel_Logo.png') }}"
                       width="100%" height="100%" alt=""></a>
           </div>
           <div class="sidebar-close">
               <span class="material-icons-outlined">close</span>
           </div>
       </div>
       <div class="sidebar-nav mm-active">
           <!--navigation-->
           <ul class="metismenu" id="sidenav" class="has-arrow mm-collapse">
               {{-- <li class="@if (Route::is('admin.dashboard')) mm-active @endif">
            <a href="/admin/dashboard" >
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>

          </li> --}}
               <li class="@if (Route::is('admin.home.*')) mm-active @endif">
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">home</i>
                       </div>
                       <div class="menu-title">Dashboard</div>
                   </a>
                   <ul>
                       <li><a href="{{ route('admin.home.brands') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Brands</a>
                       </li>
                       <li><a href="{{ route('admin.home.array-expertise') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Array Of Our Expertise</a>
                       </li>
                       <li><a href="{{ route('admin.home.case-studies') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Case Studies</a>
                       </li>
                   </ul>
               </li>
               <li class="@if (Route::is('admin.about.*')) mm-active @endif">
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">info</i>
                       </div>
                       <div class="menu-title">About</div>
                   </a>
                   <ul>
                       <li><a href="{{ route('admin.about.worklife') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Worklife-Company</a>
                       </li>
                       <li><a href="{{ route('admin.about.leadership') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Leadership-Company</a>
                       </li>
                       <li><a href="{{ route('admin.about.presence') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Presence-Company</a>
                       </li>
                       <li><a href="{{ route('admin.about.testimonials') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Testimonials-Career</a>
                       </li>
                       <li><a href="{{ route('admin.about.media') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Media-Resources</a>
                       </li>
                       <li><a href="{{ route('admin.about.blogs') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Blogs-Resources</a>
                       </li>
                       <li><a href="{{ route('admin.about.webinars') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Webinars-Resources</a>
                       </li>
                   </ul>
               </li>
               <li class="@if (Route::is('admin.solutions.*')) mm-active @endif">
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">emoji_objects</i>
                       </div>
                       <div class="menu-title">Solutions</div>
                   </a>
                   <ul>
                       <li><a href="{{ route('admin.solutions.impact-numbers') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Our impact in numbers</a>
                       </li>
                       <li><a href="{{ route('admin.solutions.category') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Category</a>
                       </li>


                   </ul>
               </li>
               <li class="@if (Route::is('admin.integrations.*')) mm-active @endif">
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">integration_instructions</i>
                       </div>
                       <div class="menu-title">Integrations</div>
                   </a>
                   <ul>
                       <li><a href="{{ route('admin.integrations.api-integrations') }}"><i
                                   class="material-icons-outlined">arrow_right</i>API & Integrations</a>
                       </li>
                       <li><a href="{{ route('admin.integrations.benefits') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Benefits</a>
                       </li>
                       <li><a href="{{ route('admin.integrations.usp') }}"><i
                                   class="material-icons-outlined">arrow_right</i>USP</a>
                       </li>


                   </ul>
               </li>
               <li class="@if (Route::is('admin.success-stories.*')) mm-active @endif">
                   <a href="javascript:;" class="has-arrow">
                       <div class="parent-icon"><i class="material-icons-outlined">auto_stories</i>
                       </div>
                       <div class="menu-title">Success Stories</div>
                   </a>
                   <ul>
                       <li><a href="{{ route('admin.success-stories.case-study') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Case Study</a>
                       </li>
                       <li><a href="{{ route('admin.success-stories.compliance') }}"><i
                                   class="material-icons-outlined">arrow_right</i>Compliance</a>
                       </li>



                   </ul>
               </li>
           </ul>
           <!--end navigation-->
       </div>
   </aside>
   <!--end sidebar-->
