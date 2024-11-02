<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Listar tareas del usuario autenticado
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->orderBy('created_at', 'desc')->get();

        return response()->json($tasks, 200);
    }

    // Crear nueva tarea
    public function store(TaskStoreRequest $request)
    {
        
        $task = $request->user()->tasks()->create($request->validated());

        return response()->json([
            'message' => 'Tarea creada correctamente',
            'task' => $task
        ], 201);
    }

    // Mostrar una tarea específica
    public function show(Request $request, $id)
    {
        $task = $request->user()->tasks()->find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        return response()->json($task, 200);
    }

    // Actualizar tarea
    public function update(TaskUpdateRequest $request, $id)
    {
        $task = $request->user()->tasks()->find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $task->update($request->validated());

        return response()->json([
            'message' => 'Tarea actualizada correctamente',
            'task' => $task
        ], 200);
    }

    // Eliminar tarea
    public function destroy(Request $request, $id)
    {
        $task = $request->user()->tasks()->find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente'
        ], 200);
    }
}