<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Description, Author -->
    <meta name="description" content="{{ config('app.meta_description') ?? '' }}">
    <meta name="author" content="{{ config('app.meta_author') ?? '' }}">
    <link rel="shortcut icon" href="{{ url('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">    

    <!-- Base CSS -->
    <link rel="stylesheet" href="{{ url('assets/admin/css/basestyle/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/admin/css/dataTables.bootstrap4.min.css') }}" type="text/css" >
    <link href="{{ url('assets/admin/css/fonts.css') }}" rel="stylesheet">    
    <title>@yield('title') - {{ config('app.name') ?? '' }}</title>
  </head>