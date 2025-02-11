 <!--start header-->
        <header class="top-header">
            <nav class="navbar navbar-expand align-items-center gap-4">
                <div class="btn-toggle">
                    <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
                </div>
                <div class="search-bar flex-grow-1">
                    <div class="position-relative">
                        <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                            placeholder="Search">
                        <span
                            class="material-icons-outlined position-absolute d-lg-block d-none ms-3 translate-middle-y start-0 top-50">search</span>
                        <span
                            class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                        <div class="search-popup p-3">
                            <div class="card rounded-4 overflow-hidden">
                                <div class="card-header d-lg-none">
                                    <div class="position-relative">
                                        <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                            placeholder="Search">
                                        <span
                                            class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                        <span
                                            class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                                    </div>
                                </div>
                                <div class="card-body search-content">
                                    <p class="search-title">Recent Searches</p>
                                    <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                        <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>Sass</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                        <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                                                class="material-icons-outlined fs-6">search</i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <ul class="navbar-nav gap-1 nav-right-links align-items-center">

                    {{-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
            data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
          <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
            <div class="border rounded-4 overflow-hidden">
              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="{{ asset('website/assets/images/apps/01.png')}}" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Gmail</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="{{ asset('website/assets/images/apps/02.png')}}" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Skype</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/03.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Slack</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/04.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">YouTube</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/05.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Google</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/06.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Instagram</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0 border-bottom">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/07.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Spotify</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/08.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Yahoo</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/09.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Facebook</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->

              <div class="row row-cols-3 g-0">
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/10.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Figma</p>
                    </div>
                  </div>
                </div>
                <div class="col border-end">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/11.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Paypal</p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="app-wrapper d-flex flex-column gap-2 text-center">
                    <div class="app-icon">
                      <img src="assets/images/apps/12.png" width="36" alt="">
                    </div>
                    <div class="app-name">
                      <p class="mb-0">Photo</p>
                    </div>
                  </div>
                </div>
              </div><!--end row-->
            </div>
          </div>
        </li> --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;"><i
                                class="material-icons-outlined">notifications</i>
                            <span class="badge-notify">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                            <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                                <h5 class="notiy-title mb-0">Notifications</h5>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="material-icons-outlined">
                                            more_vert
                                        </span>
                                    </button>
                                    <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">inventory_2</i>Archive All</a>
                                        </div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">done_all</i>Mark all as
                                                read</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">mic_off</i>Disable
                                                Notifications</a></div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">grade</i>What's new ?</a></div>
                                        <div>
                                            <hr class="dropdown-divider">
                                        </div>
                                        <div><a class="dropdown-item d-flex align-items-center gap-2 py-2"
                                                href="javascript:;"><i
                                                    class="material-icons-outlined fs-6">leaderboard</i>Reports</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="notify-list" style="height: min-content !important;">
                                <div>
                                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="{{ asset('website/assets/images/avatars/01.png') }}"
                                                    class="rounded-circle" width="45" height="45" alt="">
                                            </div>
                                            <div class="">
                                                <h5 class="notify-title">Congratulations Jhon</h5>
                                                <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.
                                                </p>
                                                <p class="mb-0 notify-time">Today</p>
                                            </div>
                                            <div class="notify-close position-absolute end-0 me-3">
                                                <i class="material-icons-outlined fs-6">close</i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a class="dropdown-item border-bottom py-2" href="javascript:;">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="">
                                                <img src="{{ asset('website/assets/images/avatars/06.png') }}"
                                                    class="rounded-circle" width="45" height="45"
                                                    alt="">
                                            </div>
                                            <div class="">
                                                <h5 class="notify-title">Congratulations Jhon</h5>
                                                <p class="mb-0 notify-desc">Many congtars jhon. You have won the gifts.
                                                </p>
                                                <p class="mb-0 notify-time">Today</p>
                                            </div>
                                            <div class="notify-close position-absolute end-0 me-3">
                                                <i class="material-icons-outlined fs-6">close</i>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret"
                            data-bs-toggle="dropdown">
                            <img src="{{asset('assets/images/icon.png')}}"
                                class="rounded-circle p-1 border" width="45" height="45" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/icon.png')}}"
                                        class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                                        alt="">
                                    <h5 class="user-name mb-0 fw-bold">{{ Auth::user()->name }}</h5>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('admin.profile.index') }}"><i
                                    class="material-icons-outlined">person_outline</i>Profile</a>
                            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('admin.dashboard') }}"><i
                                    class="material-icons-outlined">dashboard</i>Dashboard</a>
                            <hr class="dropdown-divider">
                            <form action="{{ route('admin.logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2"><i
                                        class="material-icons-outlined">power_settings_new</i>Logout</button>
                            </form>

                        </div>
                    </li>
                </ul>

            </nav>
        </header>
        <!--end top header-->
