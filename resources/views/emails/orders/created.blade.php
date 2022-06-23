@component('mail::message')
# Hello {{ $order->user->name }}

We Want to notify you that your order has been placed.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
