@component('mail::message')
# Hello

You received an email from {{$data['nom']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
