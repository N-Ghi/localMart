@component('components.emails', [
    'subject' => 'You are receiving this email because it was used to sign up for an account in our system. Please press the button below to confirm your email.',
    'header' => 'Email Confirmation',
    'footer' => 'If you did not create an account, no further action is required.',
    'buttonUrl' => $confirmUrl,
    'buttonText' => 'Confirm'
])
    <p>{{ $greeting ?? 'Hello,' }}</p>
    <p>{{ $message ?? 'Please confirm your email address by clicking the button below.' }}</p>

    @if(!empty($buttonText) && !empty($buttonUrl))
        <a href="{{ $buttonUrl }}" class="button">{{ $buttonText }}</a>
    @endif

    <p>{{ $closing ?? 'Best regards,' }}</p>
    <p>{{ $signature ?? 'The Team' }}</p>
@endcomponent
