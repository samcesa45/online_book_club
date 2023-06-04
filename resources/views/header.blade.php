<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <!-- Bootstrap plugin -->
        <link href="{{ asset('dist/bootstrap-5.2.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    </head>
    <style>
       *, *::before,*::after{
            padding: 0;
            margin: 0;
            box-sizing: border-box
        }
        body{
            font-size: 62.5%;
            line-height: 1.25;
            -webkit-font-smoothing:antialiased;
        }
    </style>