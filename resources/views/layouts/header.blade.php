<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield("title")</title>
  {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="logo">VotreLogo</div>
      
      <nav>
        <ul class="nav-menu">
          <li><a href="#">Accueil</a></li>
          <li><a href="#">À propos</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      
      <div class="header-buttons">
        <button class="search-button">
          <i>🔍</i>
        </button>
        <button class="menu-toggle">
          <i>☰</i>
        </button>
      </div>
    </div>
  </header>
  