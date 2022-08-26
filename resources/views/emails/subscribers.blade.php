@component('mail::message')
# Introduction
Dear {{$email}},

Welcome to Laravel starter pack by Alois Mugambi. I have put this together to save you a lot of time when building an
app. Feel free to buy me a cup of coffee.

@component('mail::button', ['url' => 'https://github.com/techwizzy', 'color' => 'success'])
My Github
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
