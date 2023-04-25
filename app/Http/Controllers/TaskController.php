<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use App\Models\Folder;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index($id){
        $model   = new Folder();
        $folders = $model->getFolder();
        $folders = Auth::user()->folders()->get();

        $currentFolder = $folders->find($id);
        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $currentFolder->tasks()->get();

        return view('tasks/index', [
            'folders'           => $folders,
            'current_folder_id' => $id,
            'tasks'             => $tasks,
        ]);
    }

    public function showCreate($id){
        return view('tasks/create',['folder_id' => $id]);
    }

    public function create($id, CreateTask $req){
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title    = $req->title;
        $task->due_date = $req->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);
    }

    public function showEditForm($id, $task_id){
        $task = Task::find($task_id);

        return view('tasks/edit',['task' => $task]);
    }

    public function edit($id, $task_id, EditTask $req){
        //リクエストされた ID でタスクデータを取得します。これが編集対象となります。
        $task = Task::find($task_id);

        $task->title    = $req->title;
        $task->status   = $req->status;
        $task->due_date = $req->due_date;
        $task->save();

        return redirect()->route('tasks.index',['id' => $task->folder_id]);
    }
}
