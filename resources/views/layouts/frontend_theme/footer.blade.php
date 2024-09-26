
<section class="sub_menu_footer">
  <div class="container">
      <div class="row">
        <div class="col-lg-3 border-end">
          <ul class="list-unstyled text-sm-center mb-sm-0 mb-4">
              <li>
                  <h6>Apartments in Hyderabad</h6>
              </li>


              @menu('Apartments in Hyderabad', 'list-unstyled', false, 'footer-dropdown-item', 'false')


          </ul>
      </div>


          <div class="col-lg-3 border-end">
              <ul class="list-unstyled text-sm-center mb-sm-0 mb-4">
                  <li>
                      <h6>Find Apartments by Budget</h6>
                  </li>
                  @menu('Find Apartments by Budget', 'list-unstyled', false, 'footer-dropdown-item', 'false')
              </ul>
          </div>
          <div class="col-lg-3 border-end">
              <ul class="list-unstyled text-sm-center mb-sm-0 mb-4">
                  <li>
                      <h6>Popular locations in Hyderabad</h6>
                  </li>

                  @menu('Top Locations in Hyderabad', 'list-unstyled', false, 'footer-dropdown-item', 'false')
              </ul>
          </div>
          <div class="col-lg-3">
              <ul class="list-unstyled text-sm-center mb-sm-0 mb-4">
                  <li>
                      <h6>Hyderabad Top builders</h6>
                  </li>
                  @menu('Top builders', 'list-unstyled', false, 'footer-dropdown-item', 'false')
              </ul>
          </div>

      </div>
  </div>
</section>



<!-- <section class="footer-before-sec">
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
</section> -->

<!-- <footer class="pb-2">
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
</footer> -->

<footer class="py-3">
  <div class="container py-0">
    <div class="row align-items-center">
      <div class="col-lg-3">
      <div class="footer-logo">
          @if(isset($footer_logo) && File::exists($footer_logo))
          <img src=" {{ URL::to(asset($footer_logo)) }}" width="230px" class="img-fluid mb-sm-2 mb-1" alt="{{ env('APP_NAME') }}">
          @endif
      </div>
      <div class="social-links">
          <ul>
            <li><a href="{{ $linkedin_url??'#' }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="{{ $facebook_url??'#' }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="{{ $twitter_url??'#' }}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="{{ $instagram_url??'#' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="{{ $whatsapp_url??'#' }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">
        <p class="text-white">Perfect Living is a trusted platform that lists carefully curated top properties in Hyderabad. We focus on providing detailed, reliable project information to help you make informed decisions. Our commitment is to transparency and quality, ensuring you find the right property with confidence.</p>
      </div>
      <div class="col-lg-3">
        <ul class="inline-links d-flex justify-content-center">
          <li><a href="{{ URL::to('terms-of-use') }}" class="text-white">Terms of Use</a></li>
          <li><a href="{{ URL::to('contact-us') }}" class="text-white">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>


<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cookieModal">
  Launch demo modal
</button> -->
<!-- Cookie Modal -->
<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header justify-content-center">
          <h5 class="modal-title text-brand" id="cookieModalLabel">Disclaimer</h5>
        </div>
        <div class="modal-body">
          <p>
          All information present on <a href="https://perfectliving.in/">perfectliving.in</a> has been made available for informational purposes only.
          No representation or warranty is expressly or impliedly given as to its accuracy. Any investment decisions
          that you take should not be based relying solely on the information that is available on <a href="https://perfectliving.in/">perfectliving.in</a> or
          on any secondary source of information that relies on data downloaded from <a href="https://perfectliving.in/">perfectliving.in</a></p>
          <p>
          Nothing contained herein shall be deemed to constitute legal advice, solicitation, or invitation to acquire
          by the developer/builder or any other entity. You are advised to visit the relevant RERA website and contact
          builder/advertisers directly to know more about the project before taking any decision based on the contents
          displayed on the website <a href="https://perfectliving.in/">perfectliving.in</a>.
          </p>
          <p>
          Owners or the representatives of the projects can reach out to <a href="mailto:info@perfectliving.in" class="text-brand">info@perfectliving.in</a> to rectify any factually
          incorrect information pertaining to their own projects. All customer reviews expressed on this website are
          subject to review and approval.
          </p>
          <p>
          <a href="https://perfectliving.in/">perfectliving.in</a> may set cookies or track your activity to provide you with personalized content, and your
          usage of the site is deemed as consent to set tracking cookies. Trademarks belong to the respective owners.
          </p>
        </div>
        <div class="modal-footer cookie-modal-footer justify-content-sm-center">
        <button type="button" class="btn btn-success border-radius-0" id="acceptCookies">Accept</button>
          <button type="button" class="btn btn-brand" id="declineCookies">Decline</button>
        </div>
      </div>
    </div>
  </div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content login-card px-sm-5 py-sm-4">
      <div class="modal-header py-2 border-bottom-0">
        <h3 class="modal-title w-100 text-center" id="exampleModalLabel">Log in</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="">
        <div class="card-body">
            <form id="loginForm" method="POST" action="{{ route('verify.Auth.Login') }}" autocomplete="off">
                @csrf
                <div class="form-group mb-4">
                    <div class="">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group mb-4">
                    <div class="">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required autocomplete="off">
                    </div>
                </div>
                {{-- <div class="mb-4">
                    <p><small>By continuing, you agree to <a href="#" class="text-brand">Terms of Use</a> & <a href="#" class="text-brand">Privacy Policy</a>.</small></p>
                </div> --}}
                <div class="form-group mb-4">
                    <button type="submit" class="btn btn-danger border-radius-0 w-100">Continue</button>
                </div>
                {{-- <div class="">
                    <p><small>Have trouble logging in? <a href="#" class="text-brand">Get help</a></small></p>
                </div> --}}
                    <!-- Hidden Redirect URL -->
                <input type="hidden" name="redirect_to" value="{{ request('redirect_to') }}">
            </form>
            <div class="">
                <p><small>Don't have an account yet? <a href="{{ URL::TO('create_account') }}" class="text-brand">Create your account</a></small></p>
            </div>
        </div>
    </div>
      </div>
    </div>
  </div>
</div>