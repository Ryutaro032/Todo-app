<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
