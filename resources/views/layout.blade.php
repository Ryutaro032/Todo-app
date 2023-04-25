<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo App</title>
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
    <body>
        <header>
            <nav class="my-navbar">
                <a class="my-navbar-brand" href="/">ToDo App</a>
                <div class="my-navbar-control">
                    <!-- Auth クラスの check メソッドでログインしているかどうかを確認 -->
                    @if(Auth::check())
                        <span class="my-navbar-item">ようこそ、{{ Auth::user()->name }}さん</span>
                        |
                        <a href="" id="logout" class="my-navbar-item">ログアウト</a>
                        <form action="{{ route('logout') }}" id="logout-form" method="post" style="display:none;">
                        @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="my-navbar-item">ログイン</a>
                        |
                        <a href="{{ route('register') }}" class="my-navbar-item">会員登録</a>
                    @endif
                </div>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        @if(Auth::check())
        <script>
            document.getElementById('logout').addEventListener('click', function(event){
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>
        @endif
        @yield('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="javascripts/bootstrap.min.js"></script>
    </body>
</html>