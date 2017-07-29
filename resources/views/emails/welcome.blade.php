@component('mail::message')
# Introduction

Thanks so much for registering!

@component('mail::button', ['url' => 'https://laracasts.com'])
Start Browsing
@endcomponent

@component('mail::panel')
Never stop learning!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
