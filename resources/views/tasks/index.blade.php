<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">To do App</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <nav class="panel">
                        <div class="panel-heading">フォルダ</div>
                        <div class="panel-body">
                            <a href="#" class="btn">
                                フォルダを追加する
                            </a>
                        </div>
                        <div class="list-group">
                            @foreach($folders as $folder)
                            <a href="{{ route('tasks.index', ['id' => $folder->id]) }}" 
                               class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
                            >
                                {{ $folder->title }}
                            </a>
                            @endforeach
                        </div>
                    </nav>
                    <div class="column col-md-8">
                        <!-- ここにタスクが表示される -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>