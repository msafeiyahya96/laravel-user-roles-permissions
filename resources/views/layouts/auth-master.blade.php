<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Muhammad Safe'i Yahya, and Bootstrap Contributors">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/css/signin.css') !!}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom Style for this template -->
    <link rel="stylesheet" href="signin.css">
</head>
<body class="text-center">
    <main class="form-signin">
        @yield('content')
    </main>
</body>
</html>