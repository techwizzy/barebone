@component('mail::message')
# Introduction
Dear {{$email}},

Welcome to Laravel starter pack by Alois Mugambi. I have put this together to save you a lot of time when building an
app. Feel free to buy me a cup of coffee.

@component('mail::button', ['url' => 'https://www.paypal.com/donate/?hosted_button_id=BEMNE44V2DQNU', 'color' => 'success'])
Buy Me Coffee
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
