<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use App\Models\Folder;

class FolderController extends Controller
{
    public function showCreate(){
        return view('folders/create');
    }

    public function create(CreateFolder $req){
            $folder  = new Folder();
            $folder->title = $req->title;
            $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}
