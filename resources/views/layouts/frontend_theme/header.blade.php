


  <header id="main-header">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-sm-3 col-6 px-sm-3 p-0">
        <a href="{{ url('/') }}">

          @if(isset($header_logo) && File::exists($header_logo))
          <img src=" {{ URL::to(asset($header_logo)) }}" class="img-fluid header-logo" alt="{{ env('APP_NAME') }}">
      @else

      @endif

         </a>
        </div>
        <div class="col-sm-9 col-6">
          <nav class="navbar navbar-expand-lg navbar-light p-0 justify-content-lg-start justify-content-end">
            <!-- Toggle button for small screens -->
            <button class="navbar-toggler p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <!-- Adding your white-colored toggle icon -->
                <img src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23FFFFFF' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e" alt="Menu">
              </span>
            </button>

            <!-- Menu items collapse on mobile -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

              <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ URL('') }}">Home</a>
                </li>



              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Apartments in Hyderabad
                </a>
                <ul class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
                  {{-- <li><a class="dropdown-item" href="#">2 BHK Apartments in Hyderabad</a></li>
                  <li><a class="dropdown-item" href="#">3 BHK Apartments in Hyderabad</a></li> --}}

                  @menu('Apartments in Hyderabad', 'list-unstyled', false, 'dropdown-item', 'false')


                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Top Locations
                </a>
                <ul class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">


                  @menu('Apartments in Financial District', 'list-unstyled', false, 'dropdown-item', 'false')


                </ul>
              </li>

              {{-- <li class="nav-item">
                  <a class="nav-link text-white" href="{{ URL('') }}"><i class="fa-solid fa-house"></i></a>
                </li>
                <!-- Mega Menu -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="megaMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Projects
                  </a>
                  <div class="dropdown-menu mega-menu p-sm-4 p-3" aria-labelledby="megaMenu">
                    <div class="container p-0">
                      <div class="row">
                        <div class="col-sm-6 mb-4">
                          <h5>Hyderabad</h5>
                          <!-- To display a full list -->
                          @menu('Top Locations in Hyderabad', 'list-unstyled', false, 'dropdown-item', 'false')
                          </div>

                      </div>
                    </div>
                  </div>
                </li> --}}
                <!-- Additional Links -->
                {{-- <li class="nav-item">

@menu('About us', "", "", 'nav-link text-white', 'true')

                </li> --}}
                {{-- <li class="nav-item">
                  @menu('Contact Us', "", "", 'nav-link text-white','true')
                </li> --}}
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
