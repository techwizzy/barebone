@component('mail::message')
# Your Alerts Email Update
Dear {{$name}},

Your alerts email has been updated to {{ $alerts_email }} from {{ $email }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
