@component('mail::message')
# Verify Your Email Address

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify Email Address
@endcomponent

Thank you for using our application!

{{ config('app.name') }}
@endcomponent
