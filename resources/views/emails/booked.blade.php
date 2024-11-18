@component('components.emails', [
    'subject' => 'Congratulations on booking your adventure, do not forget to add it your calendar so that you do not forget it.',
    'header' => 'Booking Confirmation',
    'footer' => 'If you did not create an account, no further action is required.',

])
    <p>{{ $greeting ?? 'Hello,' }}</p>
    <p>{{ $message ?? 'Please confirm your email address by clicking the button below.' }}</p>

    @if(!empty($buttonText) && !empty($buttonUrl))
        <a href="{{ $buttonUrl }}" class="button">{{ $buttonText }}</a>
    @endif

    <p>{{ $closing ?? 'Best regards,' }}</p>
    <p>{{ $signature ?? 'The Team' }}</p>
@endcomponent
