<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskService
{
    public function getAllTasks()
    {
        return Task::with(['assignee', 'reporter', 'watcher'])->paginate(2);
    }

    public function createTask($data)
    {
        $task = Task::create($data);
        return $task->load(['assignee', 'reporter', 'watcher']);
    }

    public function getTaskById(Task $task)
    {
        return $task->load(['assignee', 'reporter', 'watcher']);
    }

    public function updateTask(UpdateTaskRequest $request, Task $task)
    {
        $validatedData = $request->validated();
        $task->update($validatedData);
        return $task->load(['assignee', 'reporter', 'watcher']);
    }

    public function deleteTask(Task $task)
    {
        $task->delete();
    }
}
