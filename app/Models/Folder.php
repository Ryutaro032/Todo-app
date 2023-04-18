<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Folder extends Model
{
    protected $table = 'folders';
    protected $fillable = ['title'];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
    
    public function getFolder(){
        $folders = Folder::all();
        return $folders;
    }

    // public function createFolder($data){
    //     DB::table('folders')->insert([
    //         'title'         => $data->title,
    //         'created_at'    =>  now(),
    //         'updated_at'    =>  now()
    //     ]);
    // }

}
