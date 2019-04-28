<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        .background-wrap{
            position: fixed;
            width: 100%;
            z-index: -999;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
        }

        #video-bg-element{
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
        }

    </style>

    <script>
        window.App = {!! json_encode([
            'signedIn' => $authUser ? true : false,
            'user'     => $authUser,
        ]) !!}
    </script>
</head>
<body class="fixed-header">