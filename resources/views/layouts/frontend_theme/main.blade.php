<!-- resources/views/layouts/theme/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>


    @if(isset($favicon) && File::exists($favicon))

<link rel="shortcut icon"  type="image/x-icon" href="{{ URL::to('favicon.ico') }}">

<link rel="shortcut icon"  type="image/png"  sizes="30x30" href="{{ URL::to('favicon.png') }}">

@else
@endif



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>@yield('pageTitle', env('DEFAULT_TITLE'))</title>




 <!-- Meta Description -->
 <meta name="description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">

 <!-- Meta Keywords -->
 <meta name="keywords" content="Hyderabad real estate, real estate projects, property reviews, real estate transparency, Hyderabad property, new projects in Hyderabad">

 <!-- Meta Author -->
 <meta name="author" content="Your Company Name">

 <!-- Open Graph Meta Tags for Social Media -->
 <meta property="og:title" content="@yield('pageTitle', env('DEFAULT_TITLE'))">
 <meta property="og:description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">
 <meta property="og:image" content="{{ URL::to('favicon.png') }}">
 <meta property="og:url" content="{{ URL::to('/') }}">
 <meta property="og:type" content="website">

 <!-- Twitter Card Meta Tags -->
 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:title" content="@yield('pageTitle', env('DEFAULT_TITLE'))">
 <meta name="twitter:description" content="Discover upcoming real estate projects in Hyderabad. Honest customer reviews, transparent information, and more. Stay tuned for updates!">
 <meta name="twitter:image" content="{{ URL::to('favicon.png') }}">



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


    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "o8lpg8x0jj");
    </script>
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
    const toastrOptions = {
        closeButton: true,
        progressBar: true,
        timeOut: 60000, // Time before hiding (60 seconds)
        extendedTimeOut: 10000, // Time for extended timeout on mouse hover (10 seconds)
        preventDuplicates: false,
        tapToDismiss: false,
        hideEasing: 'linear', // Easing method for hiding
        hideMethod: 'fadeOut', // Animation method for hiding
        hideDuration: 5000, // Duration for the hiding animation (5 seconds)
        closeDuration: 100 // Duration for the closing animation (0.1 seconds)
    };

    toastr.options = toastrOptions;

    if (typeof toastrMessages !== 'undefined') {
        if (toastrMessages.toast_success) {
            toastr.success(toastrMessages.toast_success);
        }
        if (toastrMessages.message) {
            toastr.success(toastrMessages.message);
        }
        if (toastrMessages.success) {
            toastr.success(toastrMessages.success);
        }
        if (toastrMessages.error) {
            toastr.error(toastrMessages.error);
        }
        if (toastrMessages.info) {
            toastr.info(toastrMessages.info);
        }
        if (toastrMessages.warning) {
            toastr.warning(toastrMessages.warning);
        }
    }
});


    </script>

<script>
    window.toastrMessages = {
        @if(Session::has('toast_success')) toast_success: "{{ session('toast_success') }}", @endif
        @if(Session::has('message')) message: "{{ session('message') }}", @endif
        @if(Session::has('success')) success: "{{ session('success') }}", @endif
        @if(Session::has('error')) error: "{{ session('error') }}", @endif
        @if(Session::has('info')) info: "{{ session('info') }}", @endif
        @if(Session::has('warning')) warning: "{{ session('warning') }}", @endif
    };
</script>


   



<!-- Bootstrap 5 CSS and JS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

@stack('scripts') <!-- Stack for additional scripts -->

</body>
</html>
