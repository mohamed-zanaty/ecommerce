@component('mail::message')
# Introduction

welcome {{$data['data']->name}}
@component('mail::button', ['url' => route('reset',$data['token'])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
