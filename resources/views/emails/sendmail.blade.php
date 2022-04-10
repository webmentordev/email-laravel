@component('mail::message')
# {{ $subject }}

{{ $body }}

Thanks,<br>
{{ $sender_name }}
@endcomponent
