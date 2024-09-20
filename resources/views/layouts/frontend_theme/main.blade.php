<!-- resources/views/layouts/theme/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>


    @if(isset($favicon) && File::exists($favicon))
<link rel="shortcut icon" href="{{ URL::to(asset($favicon)) }}">
@else
@endif



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Hyderabad Real Estate Projects - Honest Reviews & Transparent Information</title>

    {{-- <title>{{ $pageTitle ?? 'Default Title' }}</title> --}}

 <!-- Meta Description -->
 <meta name="description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">

 <!-- Meta Keywords -->
 <meta name="keywords" content="Hyderabad real estate, real estate projects, property reviews, real estate transparency, Hyderabad property, new projects in Hyderabad">

 <!-- Meta Author -->
 <meta name="author" content="Your Company Name">

 <!-- Open Graph Meta Tags for Social Media -->
 <meta property="og:title" content="Hyderabad Real Estate Projects - Honest Reviews & Transparent Information">
 <meta property="og:description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">
 <meta property="og:image" content="URL_TO_YOUR_IMAGE">
 <meta property="og:url" content="https://perfectliving.in/">
 <meta property="og:type" content="website">

 <!-- Twitter Card Meta Tags -->
 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:title" content="Hyderabad Real Estate Projects - Honest Reviews & Transparent Information">
 <meta name="twitter:description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">
 <meta name="twitter:image" content="URL_TO_YOUR_IMAGE">



    <!-- Include CSS files here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
     <!-- Slick Scrolling -->
     <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/website/css/slick.css') }}"/>
     <!-- Custom Styles -->
     <link rel="stylesheet" href="{{ URL::to('assets/website/css/style.css') }}">
     <!-- Include the intl-tel-input CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">


    @stack('styles') <!-- Stack for additional styles -->

        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MRHLK3Q5');</script>
    <!-- End Google Tag Manager -->


</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRHLK3Q5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('layouts.frontend_theme.header')
    @include('layouts.frontend_theme.navbar')

    <main>
        @yield('mainContent')
    </main>

    @include('layouts.frontend_theme.footer')

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <!-- Include the intl-tel-input JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/10.0.2/js/utils.js"></script>
    <!-- Local Scripts -->
    <script src="{{ URL::to('assets/website/js/slick.min.js') }}"></script>
    <script src="{{ URL::to('assets/website/js/projects.js') }}"></script>
    <script src="{{ URL::to('assets/website/js/common.js') }}"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
      $(document).ready(function() {
        // Initialize toastr notifications if any
        @if(Session::has('toast_success'))
            toastr.success("{{ session('toast_success') }}");
        @endif
        @if(Session::has('message'))
            toastr.info("{{ session('message') }}");
        @endif
        @if(Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
      });
    </script>



    @stack('scripts') <!-- Stack for additional scripts -->

</body>
</html>
