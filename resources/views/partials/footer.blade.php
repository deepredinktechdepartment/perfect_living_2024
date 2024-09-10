<footer class="bg-peacockblue py-3" id="main-footer">
    <div class="container">
        <div class="d-sm-flex justify-content-between align-items-center">
            <p class="m-0 p-0 text-white">{{ $copyright??'' }}</p>

@if(isset($footer_logo) && File::exists($footer_logo))
<img src="{{ URL::to(asset($footer_logo)) }}" alt="leadstore logo" class="img-fluid" />
@else
{{ env('APP_NAME') }}
@endif



        </div>
    </div>
</footer>
