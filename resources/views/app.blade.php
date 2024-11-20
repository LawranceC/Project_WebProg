<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="build/assets/app.css">
</head>
<body class="container-fluid min-vh-100 d-flex flex-column p-0 m-0">
    <header class="px-3">
        @yield('navbar')
    </header>

    <main class="p-3">
        @yield('content')
    </main>

    <script src="build/assets/app.js"></script>
</body>
</html>