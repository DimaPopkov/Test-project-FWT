@extends('layouts.base')

@section('title')
    Главная страница
@endsection
@section('content')
    @include('includes.header')
    <main class="main">     
        @if ($todos != '[]')
            <h1> Задания </h1>
            
            @foreach($todos as $task)
                <div class="ToDoList">
                    <h1> {{ $task->title }} </h1>
                    <p> {{ $task->description }} </p>
                    <p> Выполнено:
                        @if ($task->is_completed == True)
                            <a style="color:rgb(0, 220, 0)">Да</a> 
                        @elseif ($task->is_completed == False)
                            <a style="color:rgb(255, 0, 0)"> Нет </a>
                        @endif
                    </p>
                    @if ($task->is_completed == 0)
                        <button class="btn_completeTask" id="{{ $task->id }}" onclick="completeTask('{{ $task->id }}')"> Выполнить </button>
                    @endif
                    <button class="btn_deleteTask" id="{{ $task->id }}" onclick="deleteTask('{{ $task->id }}')"> X </button>
                </div>
            @endforeach
        @else
            <h1>Пока нет заданий</h1>
        @endif
    </main>
@endsection
