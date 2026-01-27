@extends('layouts.base')

@section('title')
    Создание ToDo листа
@endsection

@section('content')
    @include('includes.header')

    <main>
        <h1>Создание ToDo листа </h1>

        <form class="auth_form" action="/createToDo" method="POST">
            @csrf
            <div class="auth_form_listBlock">
                <label for="title"> Заголовок </label>
                <input class="login_input" id="title" name="title"></input>
            </div>

            <div class="auth_form_listBlock">
                <label for="description"> Описание </label>
                <textarea class="login_input" id="description" name="description"></textarea>
            </div>

            <button class="login_btn" type="submit"> Создать </button>
        </form>
    </main>
@endsection
