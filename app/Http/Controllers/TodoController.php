<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json([
            'todos' => Todo::whereNull('completed_at')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => [
                'required',
                'string',
                'max:255',
            ],
            'user_id' => [
                'required',
            ],
        ]);

        $todo = Todo::create($validated);

        return response()->json([
            'todo' => $todo,
        ]);
    }

    /**
     * Delete the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function delete(Todo $todo)
    {
        $todo->delete();
        return response('Todo deleted', 204);
    }
}
