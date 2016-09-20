<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Task extends Model
{
    public function createTask () {
        $task = new Task;

        $task->status = \Request::get('status');
        $task->content = \Request::get('content');
        $task->save();

    }

    public function deleteTask ($id) {
       Task::where('id', '=', $id)->delete();
    }

    public function updateTask($id){

        $content = \Request::get('content');
        $status = \Request::get('status');

        Task::where('id', '=', $id)->update ([
            'status' => $status,
            'content' => $content
        ]);
    }



}
