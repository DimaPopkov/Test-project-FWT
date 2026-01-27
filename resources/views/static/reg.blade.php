@extends('layouts.base')

@section('title')
    Регистрация
@endsection

@section('content')
    <main>
        <h1>Регистрация</h1>

        <form class="auth_form" action="/registration" method="POST">
            @csrf
            <div class="auth_form_listBlock">
                <label for="username"> Имя пользователя </label>
                <input class="login_input" id="username" name="username" value="{{ old('username') }}"> </input>
            </div>

            <div class="auth_form_listBlock">
                <label for="password"> Пароль </label>
                <input class="login_input" id="password" name="password" type="password"> </input>
            </div>

            <div class="auth_form_listBlock">
                <label for="password_auth"> Повторите пароль </label>
                <input class="login_input" id="password_auth" name="password_auth" type="password"> </input>
            </div>

            <button class="login_btn" type="submit"> Зарегестрироваться </button>
            <a href="{{ route('login') }}"> Войти </a>
        </form>
    </main>
@endsection