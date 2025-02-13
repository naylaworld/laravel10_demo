<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // Get all tasks
        return Task::with(['category', 'user'])->get();
    }

    public function store(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'status' => 'required|in:pending,in_progress,completed',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
            ]);

            // Create new task
            $task = Task::create($request->all());

            return response()->json($task, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show($id)
    {
        try {
            // Get the task by id
            $task = Task::with(['category', 'user'])->findOrFail($id);

            return response()->json($task, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate request data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'status' => 'required|in:pending,in_progress,completed',
                'category_id' => 'required|exists:categories,id',
                'user_id' => 'required|exists:users,id',
            ]);

            // Find the task or return 404
            $task = Task::findOrFail($id);

            // Update task with validated data
            $task->update($validatedData);

            return response()->json($task, 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'errors'  => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Task not found'
            ], 404);

        }
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $task->delete();
        return response()->json(null, 204);
    }
}
