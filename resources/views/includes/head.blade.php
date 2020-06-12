<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="Proposer aux entreprises et étudiants du lycée Simone Weil, localisé à Saint-Priest-en-Jarez, une application web qui va leur permettre de poster des offres et demandes de stages." name="descriptison">
  <meta content="projet déposer étudiants lycée Simone Weil Saint-Priest-en-Jarez application projet" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-fav/favicon-32x32.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{ asset('src/css/normalize.css') }}" rel="stylesheet"> <!-- CSS NORMALIZE CLEAN -->
  <link href="{{ asset('src/css/navAndHeader.css') }}" rel="stylesheet"><!-- CSS NAV AND HEADER -->
  <link href="{{ asset('src/css/style.css') }}" rel="stylesheet"> <!-- CSS MAIN CONTENT + FOOTER -->

</head>
