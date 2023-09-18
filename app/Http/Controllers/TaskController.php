<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Creating Task
     */
    public function assignTask(Request $request)
    {
        return Task::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'comments' => $request->input('comments'),
            'user_id' => $request->input('user_id'),
        ]);
    }


    /**
     * Display the tasks.
     */
    public function show(Task $task)
    {
        return $tasks = Task::all();
    }


    /**
     * Update the tasks.
     */
    public function Update_task(Request $request, $id)
    {
        $task = Task::find($request->id);

        $task->name = $request['name'];
        $task->status = $request['status'];
        $task->comments = $request['comments'];
        $task->user_id = $request['user_id'];

        $task->save();

        return response()->json([
            'message' => "Task Updated Successfully"
        ]);
    }


    /**
     * Re-assigning the tasks.
     */
    public function reassign_task(Request $request, $id)
    {
        $task = Task::find($id);

        $task->user_id = $request['user_id'];
        $task->save();

        return response()->json([
            'message' => "Task Re-Assigned Successfully"
        ]);
    }


    /**
     * Delete the task
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return response()->json(['message' => 'Task Deleted Duccessfully']);
    }
}