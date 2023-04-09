<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class TaskController extends Controller
{
    public function index(){
        $model = new Folder();
        $folders = $model->getFolder();

        return view('tasks/index', [
            'folders' => $folders,
        ]);
    }
}
