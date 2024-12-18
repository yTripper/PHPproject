<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Главная</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link @active('article')" aria-current="page" href="/article">Статьи</a>
      </li>
      @can('create')
      <li class="nav-item">
          <a class="nav-link @active('article/create')" aria-current="page" href="/article/create">Создать статью</a>
      </li>
      <li class="nav-item">
          <a class="nav-link @active('comment/index')" aria-current="page" href="/comment/index">Все Комментарии</a>
      </li>
      @endcan
        <li class="nav-item">
          <a class="nav-link @active('about')" aria-current="page" href="/about">О нас</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @active('contacts')" href="/contacts">Контакты</a>
        </li>
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Уведомления {{auth()->user()->unreadNotifications->count()}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach(auth()->user()->unreadNotifications as $notification)
            <li><a class="dropdown-item" href="{{route('article.show', ['article'=>$notification->data['article']['id'], 'notify'=>$notification->id])}}">{{$notification->data['article']['name']}}:{{$notification->data['comment_name']}}</a></li>
            @endforeach
          </ul>
        </li>
        @endauth
      </ul>
      @guest
      <a href="/auth/signup" class="btn btn-outline-success me-3">Регистрация</a>
      <a href="/auth/login" class="btn btn-outline-success me-3">Вход</a>
      @endguest
      @auth
      <a href="/auth/logout" class="btn btn-outline-success">Выход</a>
      @endauth

    </div>
  </div>
</nav>
    </header>
    <main>
      <div class="container mt-3">
        <div id="app">
        </div>
          @yield('content')
      </div>
    </main>
    </body>
    <footer>
      Белоногов Артем Игоревич 231-323
    </footer>
</html>
