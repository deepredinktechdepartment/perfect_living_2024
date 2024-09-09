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
      <div class="row">
        <div class="col-sm-3 col-5">
        <a href="{{ url('/') }}"><img src="{{ URL::to('assets/website/img/logo.png') }}" alt="The Perfect Living" class="img-fluid"></a>
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
                <!-- Mega Menu -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="megaMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Mega Menu
                  </a>
                  <div class="dropdown-menu mega-menu p-sm-4 p-3" aria-labelledby="megaMenu">
                    <div class="container p-0">
                      <div class="row">
                        <div class="col-lg-3 col-sm-6">
                          <h5>Category 1</h5>
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Subcategory 1</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 2</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 3</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <h5>Category 2</h5>
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Subcategory 1</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 2</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 3</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <h5>Category 3</h5>
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Subcategory 1</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 2</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 3</a></li>
                          </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                          <h5>Category 4</h5>
                          <ul class="list-unstyled">
                            <li><a class="dropdown-item" href="#">Subcategory 1</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 2</a></li>
                            <li><a class="dropdown-item" href="#">Subcategory 3</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- Additional Links -->
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Link 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Link 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white" href="#">Link 3</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
