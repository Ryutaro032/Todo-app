<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    public function getFolder(){
        $folders = Folder::all();
        return $folders;
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
