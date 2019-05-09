<?php

use Illuminate\Support\Facades\Route;


?>

   <title>{{ config('app.name', 'P-NOTE') }}</title>
	 <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	 <!-- css stylesheets -->
	 <link rel="icon" href="{{asset('img/icon.png')}}">

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">


	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}" defer></script>
