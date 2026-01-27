<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ToDoController extends Controller
{
    public function main(){
        // Получение массива ToDo
        $todos = Auth::user()->todos;

        return view('static.main', compact('todos'));
    }

    public function ToDoForm(){
        return view('static.createToDo');
    }   

    public function createToDo(Request $request){
        // Создание ToDo листа с title и description (приходят с формы)
        $todo = Auth::user()->todos()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('main');
    }

    public function deleteToDo($task_id){
        // Получение массива ToDo
        $task = Auth::user()->todos()->findOrFail($task_id);
        $task->delete();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('main')
            ]);
        }

        return redirect()->route('main')->with('success', 'Задача удалена');
    }

    public function completeToDo($task_id){
        // Получение массива ToDo
        $task = Auth::user()->todos()->findOrFail($task_id);
        $task->is_completed = 1;
        $task->save();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'redirect' => route('main')
            ]);
        }

        return redirect()->route('main')->with('success', 'Задача удалена');
    }
}
