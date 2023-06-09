@extends('layout')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <nav class="panel panel-default">
                    <div class="panel-heading">フォルダ</div>
                    <div class="panel-body">
                        <form action="post">
                        @csrf
                            <a href="{{ route('folders.create') }}">
                                <button type="button" class="btn btn-primary">フォルダを追加する</button>
                            </a>
                            <a href="#">
                                <button type="button" class="btn btn-danger">フォルダを削除する</button>
                            </a>
                        </form>
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
            </div>
            <div class="col">
                <div class="column col-md-8">
                    <!-- タスク表示 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">タスク</div>
                        <div class="panel-body">
                            <div class="text-right">
                                <a href="{{ route('tasks.create',['id' => $current_folder_id]) }}" class="btn">
                                    タスクを追加する
                                </a>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>タイトル</th>
                                    <th>状態</th>
                                    <th>期限</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>
                                        <span class="label">{{ $task->status_label }}</span>
                                    </td>
                                    <td>{{ $task->formatted_due_date }}</td>
                                    <td>
                                        <a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">編集</a>
                                    </td>
                                   <form action="post">
                                   @csrf
                                        <td>
                                            <a href="#">削除</a>
                                        </td>
                                   </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection