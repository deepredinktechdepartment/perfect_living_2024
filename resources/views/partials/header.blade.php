<header>
    <div class="container">
        <div class="row align-items-sm-center">
            <div class="col-sm-4 col-6">
                <a href="{{ route('dashboard') }}">
                      @if(isset($header_logo) && File::exists($header_logo))
                          <img src=" {{ URL::to(asset($header_logo)) }}" class="img-fluid header-logo" alt="{{ env('APP_NAME') }}">
                      @else
                      {{ env('APP_NAME') }}
                      @endif
                </a>
            </div>
            <div class="col-sm-8 col-6">
                <nav class="navbar navbar-expand-lg justify-content-end">
                    <button class="navbar-toggler p-lg-0 mt-lg-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-start text-end align-items-lg-center">
                          <li class="nav-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                          </li>



                            @if(Auth::check() && in_array(Auth::user()->role, [1, 2, 3, 4]))
                            <li class="nav-item dropdown {{ Request::routeIs('projects.index','projects.create','projects.edit','companies.index','companies.create') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Content
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ Request::routeIs('projects.index','projects.create','projects.edit','companies.index','companies.create') ? 'active' : '' }}" href="{{ route('projects.index',["tab"=>'newly_added']) }}">Projects</a></li>
                                    <li><a class="dropdown-item {{ Request::routeIs('admin.reviews.index') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}">Reviews</a></li>
                                    <li><a class="dropdown-item {{ Request::routeIs() ? 'active' : '' }}" href="{{ route('companies.index') }}">Builders</a></li>


                                </ul>
                            </li>
                            @endif


                            {{-- @if(Auth::check() && in_array(Auth::user()->role, [1, 2, 3, 4]))
                            <li class="nav-item {{ Request::routeIs('customcollections.index','customcollections.create','customcollections.edit') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('customcollections.index') }}">Collections</a>
                            </li>
                            @endif --}}







                            @if(Auth::user()->role && Auth::user()->role==1)
                            <li class="nav-item dropdown {{ Request::routeIs('customers.index','searchkeywords.lists') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Customers
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ Request::routeIs('customers.index') ? 'active' : '' }}" href="{{ route('customers.index',["tab"=>'newly_added']) }}">Lists</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item {{ Request::routeIs('searchkeywords.lists') ? 'active' : '' }}" href="{{ route('searchkeywords.lists') }}">Search Keywords</a></li>


                                </ul>
                            </li>
                            @endif




                            @if(Auth::check() && in_array(Auth::user()->role, [1]))
                            <li class="nav-item dropdown {{ Request::routeIs('admin.contacts.index') ? 'active' : '' }}">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Enquiry
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li><a class="dropdown-item {{ Request::routeIs('admin.contacts.index') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">Contacts</a></li>
                                   <!-- Divider (hr) -->


                                </ul>
                            </li>
                            @endif


                            @if(Auth::user()->role && Auth::user()->role==1)
                            <li class="nav-item {{ Request::routeIs('users.index') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('users.index') }}">Admin Users</a>
                            </li>
                            @endif

                            <li class="nav-item dropdown {{ Request::routeIs('city-masters.index','city-masters.create','badges.index','badges.create','collections.index','collections.create','amenities.index','amenities.create','area-masters.index','area-masters.create','menus.index','theme_options.index') ? 'active' : '' }}">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-gear"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                  <!-- Menus and Theme Options for Role 1 -->
                                  @if(Auth::user()->role && Auth::user()->role == 1)
                                      <!-- Menus -->
                                      <li><a class="dropdown-item {{ Request::routeIs('menus.index') ? 'active' : '' }}" href="{{ route('menus.index') }}">Menus</a></li>

                                      <!-- Theme Options -->
                                      <li><a class="dropdown-item {{ Request::routeIs('theme_options.index') ? 'active' : '' }}" href="{{ route('theme_options.index') }}">Theme Options</a></li>

                                      <!-- Divider (hr) -->
                                      <li><hr class="dropdown-divider"></li>
                                  @endif

                                  <!-- Master Menus for Roles 1, 2, and 4 -->
                                  @if(Auth::check() && in_array(Auth::user()->role, [1, 2, 4]))
                                      <li><a class="dropdown-item {{ Request::routeIs('city-masters.index') ? 'active' : '' }}" href="{{ route('city-masters.index') }}">Cities</a></li>
                                      <li><a class="dropdown-item {{ Request::routeIs('area-masters.index') ? 'active' : '' }}" href="{{ route('area-masters.index') }}">Area Masters</a></li>
                                      <li><a class="dropdown-item {{ Request::routeIs('badges.index') ? 'active' : '' }}" href="{{ route('badges.index') }}">Badges</a></li>
                                      <li><a class="dropdown-item {{ Request::routeIs('collections.index') ? 'active' : '' }}" href="{{ route('collections.index') }}">Collections</a></li>
                                      <li><a class="dropdown-item {{ Request::routeIs('amenities.index') ? 'active' : '' }}" href="{{ route('amenities.index') }}">Amenities</a></li>




                                      @endif
                              </ul>
                          </li>


                            <li class="nav-item dropdown {{ Request::routeIs('profile.show', 'reset.password', 'logout') ? 'active' : '' }}">
                              <a class="nav-link dropdown-toggle profile-dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                  @php
                                      $user = Auth::user();


                                      // Determine user initials or first character
                                      $nameParts = explode(' ', $user->fullname ?? '');
                                      $initials = '';
                                      if (count($nameParts) > 1) {
                                          $initials = strtoupper($nameParts[0][0] . $nameParts[1][0]);
                                      } else {
                                          $initials = Str::title($nameParts[0]);
                                      }
                                  @endphp


                                  @if($user->profile_photo && File::exists(storage_path('app/public/' . $user->profile_photo)))
                                  <img src="{{ URL::to(env('APP_STORAGE').''.$user->profile_photo) }}" class="profile-image img-circle" height="40" alt="{{ $user->fullname }}">
                                  @else
                                  <i class="far fa-user-circle"></i>
                                  @endif
                                  {{-- {{ $initials }} --}}
                              </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item {{ Request::routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">Your Profile</a></li>
                                    <li><a class="dropdown-item {{ Request::routeIs('reset.password') ? 'active' : '' }}" href="{{ route('reset.password') }}">Change Password</a></li>
                                    <li><a class="dropdown-item {{ Request::routeIs('logout') ? 'active' : '' }}" href="{{ route('logout') }}">Logout</a></li>
                                </ul>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
  </header>
