@component('mail::message')
# Introduction

Seja muito bem vindo

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
