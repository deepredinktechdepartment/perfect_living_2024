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
<header class="py-3 px-sm-0 px-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-8">
        <a href="{{ url('/') }}"><img src="{{ URL::to('assets/website/img/logo.png') }}" alt="The Perfect Living" class="img-fluid"></a>
      </div>
      <div class="col-sm-9 col-4">
      </div>
    </div>
  </div>
</header>
