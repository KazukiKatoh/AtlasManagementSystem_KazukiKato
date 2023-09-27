<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AtlasBulletinBoard</title>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Oswald:wght@200&display=swap" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/4507725e08.js" crossorigin="anonymous"></script>
</head>

<body class="all_content">
  <div class="d-flex">
    <div class="sidebar">
      @section('sidebar')
      <p><a href="{{ route('top.show') }}"><span><i class="fa-solid fa-house-chimney" style="color: #ffffff;"></i>　マイページ</span></a></p>
      <p><a href="/logout"><span><i class="fa-solid fa-arrow-right-from-bracket" style="color: #ffffff;"></i>　ログアウト</span></a></p>
      <p><a href="{{ route('calendar.general.show',['user_id' => Auth::id()]) }}"><span><i class="fa-solid fa-calendar-days" style="color: #ffffff;"></i>　スクール予約</span></a></p>
      @if(Auth::user()->role != 4)
      <p><a href="{{ route('calendar.admin.show',['user_id' => Auth::id()]) }}"><span><i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i>　スクール予約確認</span></a></p>
      <p><a href="{{ route('calendar.admin.setting',['user_id' => Auth::id()]) }}"><span><i class="fa-solid fa-calendar-plus" style="color: #ffffff;"></i>　スクール枠登録</span></a></p>
      @endif
      <p><a href="{{ route('post.show') }}"><span><i class="fa-solid fa-message" style="color: #ffffff;"></i>　掲示板</span></a></p>
      <p><a href="{{ route('user.show') }}"><span><i class="fa-solid fa-user-group" style="color: #ffffff;"></i>　ユーザー検索</span></a></p>
      @show
    </div>
    <div class="main-container">
      @yield('content')
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/register.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('js/bulletin.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('js/user_search.js') }}" rel="stylesheet"></script>
  <script src="{{ asset('js/calendar.js') }}" rel="stylesheet"></script>
</body>

</html>
