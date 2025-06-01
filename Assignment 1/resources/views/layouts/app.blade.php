<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Kainara')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <style>
        @font-face {
            font-family: 'Storica';
            src: url('/fonts/Storica/Storica-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }
        .fade-out {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .opening-transition {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .opening-transition.show {
            opacity: 1;
        }
        .raleway {
            font-family: 'Raleway', serif;
        }
        .storica {
            font-family: 'Storica', sans-serif;
            font-weight: 700;
            color: #895129;
        }
    </style>
    @stack('styles')
</head>
<body class="@yield('body-class')" style="background-image: url('/image/bg.png');">
    @yield('content')
    @stack('scripts')
</body>
</html>
