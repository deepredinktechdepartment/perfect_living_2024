<!-- resources/views/layouts/theme/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Default Title' }}</title>
    @if(isset($favicon) && File::exists($favicon))
<link rel="shortcut icon" href="{{ URL::to(asset($favicon)) }}">
@else
@endif

    <!-- Include CSS files here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
     <!-- Slick Scrolling -->
     <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/website/css/slick.css') }}"/>
     <!-- Custom Styles -->
     <link rel="stylesheet" href="{{ URL::to('assets/website/css/style.css') }}">

    @stack('styles') <!-- Stack for additional styles -->
</head>
<body>


    @include('layouts.frontend_theme.header')
    @include('layouts.frontend_theme.navbar')

    <main>
        @yield('mainContent')
    </main>

    @include('layouts.frontend_theme.footer')

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/10.0.2/css/intlTelInput.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/10.0.2/js/intlTelInput.min.js"></script>
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

<script>
    $("#phone").intlTelInput(
    {
  
  
      utilsScript: "{{URL::to('/js/utils.js')}}",
      initialCountry:"in",
      autoHideDialCode: true,
      separateDialCode: true,
      autoPlaceholder:"polite",
      formatOnDisplay:true,
      dropdownContainer: document.body,
  
  
      }
      );
  </script>

    @stack('scripts') <!-- Stack for additional scripts -->

</body>
</html>
