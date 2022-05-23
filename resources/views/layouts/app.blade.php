<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - EspecializaTi</title>

    <link rel="shortcut icon" href="{{utl('images/favicon.ico')}}" type="image/png">

    <!-- Faz o import do Tailwind via CDN-->
    <script src="https://cdn.tailwindcss.com"></script>

    
</head>
<body class="bg-ray-50">
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>
</body>
</html>