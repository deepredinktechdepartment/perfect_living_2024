
<section class="footer-before-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
          <ul class="footer-links-list">
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum isissf35dg</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
            @menu('Top Locations in Hyderabad')
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-col">
          <p class="list-heading text-white mt-3">Top Locations in Hyderabad</p>
          <ul class="footer-links-list">
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum isissf35dg</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
            <li><a href="">Lorem Ipsum</a></li>
            <li><a href="">Lorem Ipsum is</a></li>
            <li><a href="">Lorem Ipsum isissf</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="footer-logo mt-sm-0 mt-3">

          @if(isset($footer_logo) && File::exists($footer_logo))
          <img src=" {{ URL::to(asset($footer_logo)) }}" class="img-fluid mb-sm-4 mb-2" alt="{{ env('APP_NAME') }}">
      @endif
          <p class="text-white">{{ $short_aboutus??'' }}</p>
        </div>
        <div class="social-links mt-4 pt-2">
          <ul>

            <li><a href="{{ $linkedin_url??'#' }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="{{ $facebook_url??'#' }}"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="{{ $twitter_url??'#' }}"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="{{ $instagram_url??'#' }}"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="{{ $whatsapp_url??'#' }}"><i class="fa-brands fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="pb-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <p class="text-white">{{  $copyright??''  }}</p>
      </div>
      <div class="col-sm-9">
        <ul class="inline-links">
          <li><a href="{{ URL('terms-of-use') }}" class="text-white">Terms of Use</a></li>
          <li><a href="{{ URL('advertise-with-us') }}" class="text-white">Advertise with us</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
 <script src="{{ URL::to('assets/website/js/jquery.min.js')}}"></script>
<script src="{{ URL::to('assets/website/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ URL::to('assets/website/js/slick.min.js') }}"></script>
<script src="{{ URL::to('assets/website/js/projects.js') }}"></script>
<script src="{{ URL::to('assets/website/js/common.js') }}"></script>
</body>
</html>
