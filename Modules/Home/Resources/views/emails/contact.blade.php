@component('mail::message')
    # Introduction

    {{ $data['name'] }}
    {{ $data['email'] }}
    {{ $data['message'] }}

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
