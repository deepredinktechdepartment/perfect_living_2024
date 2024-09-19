
<section class="sub_menu_footer">
  <div class="container">
      <div class="row">
        <div class="col-lg-3 border-end">
          <ul class="list-unstyled text-center">
              <li>
                  <h6>Apartments in Hyderabad</h6>
              </li>


              @menu('Apartments in Hyderabad', 'list-unstyled', false, 'dropdown-item', 'false')


          </ul>
      </div>


          <div class="col-lg-3 border-end">
              <ul class="list-unstyled text-center">
                  <li>
                      <h6>Find Apartments by Budget</h6>
                  </li>
                  @menu('Find Apartments by Budget', 'list-unstyled', false, 'dropdown-item', 'false')
              </ul>
          </div>
          <div class="col-lg-3 border-end">
              <ul class="list-unstyled text-center">
                  <li>
                      <h6>Top Locations in Hyderabad</h6>
                  </li>

                  @menu('Top Locations in Hyderabad', 'list-unstyled', false, 'dropdown-item', 'false')
              </ul>
          </div>
          <div class="col-lg-3 border-end">
              <ul class="list-unstyled text-center">
                  <li>
                      <h6>Top builders</h6>
                  </li>
                  @menu('Top builders', 'list-unstyled', false, 'dropdown-item', 'false')
              </ul>
          </div>

      </div>
  </div>
</section>



<section class="footer-before-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-4">
            <div class="footer-col">

            </div>
          </div>

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

            <li><a href="{{ $linkedin_url??'#' }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="{{ $facebook_url??'#' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="{{ $twitter_url??'#' }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="{{ $instagram_url??'#' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="{{ $whatsapp_url??'#' }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
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
