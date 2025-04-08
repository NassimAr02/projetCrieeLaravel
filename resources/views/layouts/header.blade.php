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
    <div class="logo">
      <a href="{{ route('accueil') }}"><img src="{{ asset('img/logo.png')}}" alt="" style="width: 100px; height: auto;"></a>
    </div>
   
    <nav class="nav-mobile">
      <ul class="nav-menu">
        <li><a href="/">Accueil</a></li>
        <li><a href="{{ route('login') }}">Connexion</a></li>
        <li><a href="{{ route('staff.login')}}">Connexion employé</a></li>
      </ul>
    </nav>

    {{-- Si on veut rajouter d'autres boutons si jamais --}}
{{--    
    <div class="header-buttons">
      <button class="search-button">
        <i>🔍</i>
      </button>
    </div> --}}
  
  </div>
</header>