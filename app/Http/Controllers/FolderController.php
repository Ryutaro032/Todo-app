<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreate(){
        return view('folders/create');
    }

    public function create(CreateFolder $req){
            $folder  = new Folder();
            $folder->title = $req->title;
             // ★ ユーザーに紐づけて保存
            Auth::user()->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
