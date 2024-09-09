<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>The Perfect Living</title>
  <link rel="icon" href="{{ URL::to('favicon.jpg') }}" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="{{ URL::to('assets/website/css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <!-- Slick Scrolling -->
  <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/website/css/slick.css') }}"/>
  <!-- Custom Styles -->
  <link rel="stylesheet" href="{{ URL::to('assets/website/css/style.css') }}">
</head>

<body>


  <header class="py-3 px-sm-0 px-2" id="main-header">
    <div class="container">
      <div class="row align-items-lg-center">
        <div class="col-sm-3 col-5">
        <a href="{{ url('/') }}">

          @if(isset($header_logo) && File::exists($header_logo))
          <img src=" {{ URL::to(asset($header_logo)) }}" class="img-fluid" alt="{{ env('APP_NAME') }}">
      @else

      @endif

         </a>
        </div>
        <div class="col-sm-9 col-7">
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
              <ul class="navbar-nav m-auto">
              <li class="nav-item">
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
                        <div class="col-lg-3 col-sm-6">
<h5>Hyderabad</h5>
<!-- To display a full list -->
@menu('Top Locations in Hyderabad', 'list-unstyled', false, 'dropdown-item', 'false')
</div>
<div class="col-lg-3 col-sm-6">
<h5>Bengaluru</h5>


  <!-- To display a full list -->
@menu('Top Locations in Bengaluru', 'list-unstyled', false, 'dropdown-item', 'false')



                        </div>

                      </div>
                    </div>
                  </div>
                </li>
                <!-- Additional Links -->
                <li class="nav-item">
               <!-- Example with some empty values -->
@menu('About us', "", "", 'nav-link text-white', 'true')

                </li>
                <li class="nav-item">
                  @menu('Contact Us', "", "", 'nav-link text-white','true')
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
