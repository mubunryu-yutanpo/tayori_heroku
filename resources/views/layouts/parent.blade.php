<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontAwsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff&family=Hachi+Maru+Pop&family=M+PLUS+1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <title>@yield('title', 'home')</title>
</head>
<body>
    @section('header')
      <div class="header">
        <div class="header-logo">
          <a href="/">
            <img src="{{ asset('images/unkokko.png') }}" alt="">
          </a>
            <p class="header-logo-text">Tayori</p>
        </div>

       <button class="header-menu-btn js-menu-btn">
         <img src="{{ asset('images/menu.png') }}" alt="" class="header-menu-img">
       </button>
      </div>

      @if (Route::has('login'))
        <div class="p_menu js-menu">
          
          <div class="p_menu-close">
            <button class="p_menu-close-btn js-menu-close-btn">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>

          <li class="p_menu-list"><a href="/" class="p_menu-link">TOP</a></li>
          @auth
              <li class="p_menu-list"><a href="{{ route('mypage') }}" class="p_menu-link">マイページ</a></li>
              <li class="p_menu-list"><a href="{{ route('logout') }}" class="p_menu-link">ログアウト</a></li>
              @if(Route::currentRouteName() == 'mypage')
              <li class="p_menu-list"><a href="{{ route('prof_edit', $user->id) }}" class="p_menu-link">プロフィール編集</a></li>
              @endif
                <div class="p_menu-submenu">
                  <button class="p_menu-submenu-btn js-submenu-btn">
                    ウンチ日記
                    <i class="fa-solid fa-chevron-down js-submenu-plus-icon on"></i>
                    <i class="fa-solid fa-chevron-up js-submenu-minus-icon"></i>
                  </button>
                  <div class="p_menu-submenu-items js-submenu">
                    <li class="p_menu-list"><a href="{{ route('new_poof') }}" class="p_menu-link">日記作成</a></li>
                    <li class="p_menu-list"><a href="{{ route('index_poof', Auth::user()->id) }}" class="p_menu-link">日記編集</a></li>
                  </div>
                </div>

                <div class="p_menu-submenu">
                  <button class="p_menu-submenu-btn js-submenu-btn">
                      オシッコ日記
                      <i class="fa-solid fa-chevron-down js-submenu-plus-icon on"></i>
                      <i class="fa-solid fa-chevron-up js-submenu-minus-icon"></i>
                  </button>
                  <div class="p_menu-submenu-items js-submenu">
                    <li class="p_menu-list"><a href="{{ route('new_pee') }}" class="p_menu-link">日記作成</a></li>
                    <li class="p_menu-list"><a href="{{ route('index_pee', Auth::user()->id) }}" class="p_menu-link">日記編集</a></li>
                  </div>
                </div>

                <div class="p_menu-submenu">
                  <button class="p_menu-submenu-btn js-submenu-btn">
                      食べたもの日記
                      <i class="fa-solid fa-chevron-down js-submenu-plus-icon on"></i>
                      <i class="fa-solid fa-chevron-up js-submenu-minus-icon"></i>
                  </button>
                  <div class="p_menu-submenu-items js-submenu">
                    <li class="p_menu-list"><a href="{{ route('new_food') }}" class="p_menu-link">日記作成</a></li>
                    <li class="p_menu-list"><a href="{{ route('index_food', Auth::user()->id) }}" class="p_menu-link">日記編集</a></li>
                  </div>
                </div>
          @else
              <li class="p_menu-list"> <a href="{{ route('login') }}" class="p_menu-link">ログイン</a></li>
              @if (Route::has('register'))
                <li class="p_menu-list"><a href="{{ route('register') }}" class="p_menu-link">登録</a></li>
              @endif
          @endauth
        </div>
        @endif
    @show

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
      <div class="alert alert-primary text-center" role="alert">
        {{ session('flash_message') }}
      </div>
    @endif

    <div class="c_main">
        @yield('main')
     </div>

    @section('footer')
      <div class="footer" style="background:#B68973;">
        <p>Copyright ©️ tayori. All Right Reserved.</p>
      </div>
    @show

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/menu.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

</body>
</html>