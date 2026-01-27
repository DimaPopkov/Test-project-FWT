@extends('layouts.base')

@section('title')
    Авторизация
@endsection

@section('content')
@if($errors->any())
    <div>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif
    <main>
        <h1>Авторизация</h1>

        <form class="auth_form" action="/login" method="POST">
            @csrf
            <div class="auth_form_listBlock">
                <label for="username"> Имя пользователя </label>
                <input class="login_input" id="username" name="username" value="{{ old('username') }}"> </input>
            </div>

            <div class="auth_form_listBlock">
                <label for="password"> Пароль </label>
                <input class="login_input" id="password" name="password" type="password"> </input>
            </div>

            <button class="login_btn" type="submit"> Войти </button>
            <a href="{{ route('reg') }}"> Зарегестрироваться </a>
        </form>
    </main>
@endsection