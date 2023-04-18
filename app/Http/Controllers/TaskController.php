<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Models\Folder;
use App\Models\Task;

class TaskController extends Controller
{
    public function index($id){
        $model   = new Folder();
        $folders = $model->getFolder();

        $currentFolder = $folders->find($id);
        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $currentFolder->tasks()->get();

        return view('tasks/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreate($id){
        return view('tasks/create',['folder_id' => $id]);
    }

    public function create($id, CreateTask $req){
        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $req->title;
        $task->due_date = $req->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index',[
            'id' => $current_folder->id,
        ]);
    }
}
