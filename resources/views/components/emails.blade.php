<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Email Notification' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .email-header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
            font-size: 16px;
            line-height: 1.6;
        }
        .email-footer {
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777777;
            background-color: #f9f9f9;
            border-top: 1px solid #dddddd;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .button:hover {
            background-color: #45a049;
        }
        @media (max-width: 600px) {
            .email-content {
                width: 100% !important;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-content">
            <!-- Header Section -->
            <div class="email-header">
                <h1>{{ $header ?? 'Local Experience Marketplace' }}</h1>
            </div>
            
            <!-- Body Section -->
            <div class="email-body">
                <p>{{ $greeting ?? 'Hello,' }}</p>
                <p>{{ $message ?? 'This is an automated email message.' }}</p>

                <!-- Optional button -->
                @if(!empty($buttonText) && !empty($buttonUrl))
                    <a href="{{ $buttonUrl }}" class="button">{{ $buttonText }}</a>
                @endif

                <p>{{ $closing ?? 'Best regards,' }}</p>
                <p>{{ $signature ?? 'The Team' }}</p>
            </div>

            <!-- Footer Section -->
            <div class="email-footer">
                <p>{{ $footer ?? 'You are receiving this email because you signed up to our website.' }}</p>
            </div>
        </div>
    </div>
</body>
</html>
