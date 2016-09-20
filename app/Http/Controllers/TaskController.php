<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Http\Request;


class TaskController extends Controller
{

    public function getAll() {
        $tasks = Task::where('status', '<', '3')->get();
        return view('home')->with('tasks', $tasks);
    }

    public function createTask () {
      $task = new Task;
      $task->createTask();
      $id = DB::getPdo()->lastInsertId();
        return response()->json([
            'success' => true,
            'id' =>  $id
        ]);
    }

    public function editTask () {
        $id = \Request::get('id');

        $task = new Task;
        $task->updateTask($id);

        return response()->json([
            'success' => true,
            'id' =>  $id
        ]);
    }

    public function deleteTask () {
        $id = \Request::get('id');
        $task = new Task;
        $task->deleteTask($id);

        return response()->json([
            'id' => 'id'
        ]);
    }
}
