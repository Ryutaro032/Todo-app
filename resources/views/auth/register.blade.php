@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="panel panel-default">
                <div class="panel-heading">会員登録</div>
                <div class="panel-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="list-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="list-group">
                        <label for="name">ユーザー名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="list-group">
                        <label for="password">パスワード</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <div class="list-group">
                        <label for="password-confirm">パスワード（確認）</label>
                        <!-- 項目名 + _confirmation という名前の項目（abc_confirmation）の入力値が一致することを検証 -->
                        <input type="text" class="form-control" id="password-confirm" name="password_confirmation">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primany">送信</button>
                    </div>
                </form>
            </nav>
        </div>
    </div>
</div>
@endsection