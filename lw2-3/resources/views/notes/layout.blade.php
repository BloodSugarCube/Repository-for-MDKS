<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link href=" {{ asset('css/app.css') }}" rel="stylesheet">
    <title>Home note editor</title>
</head>

<body class="bg-dark text-white">
    <div class="album py-4">
        @yield('content')
    </div>
</body>
</html>