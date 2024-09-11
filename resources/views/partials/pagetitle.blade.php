<!-- Blade view: your-view-name.blade.php -->

<div class="d-flex justify-content-between align-items-center mb-4">

  <h1 class="text-dark">
     {{  $pageTitle??''}}
  </h1>

  <div class="filter_icons">
      <ul class="list-unstyled d-flex gap-3 align-items-center">

        @if(Auth::check() && in_array(Auth::user()->role, [1, 2, 4]))
          @if(isset($settinglink) && !empty($settinglink))
          <li>
              <a href="{{ $settinglink }}">
                  @if(isset($icon) && !empty($icon))
                      {!! $icon !!}
                  @else
                      {!! Config::get('constants.setting-icon') !!}
                  @endif
              </a>
          </li>
          @endif


          @if(isset($addlink) && !empty($addlink))
          <li>
              <a href="{{ $addlink }}">
                  @if(isset($icon) && !empty($icon))
                      {!! $icon !!}
                  @else
                      {!! Config::get('constants.add-icon') !!}
                  @endif
              </a>
          </li>
          @endif

          @endif
      </ul>



  </div>
</div>
