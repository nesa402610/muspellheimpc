@extends('template')

@section('head')
    <title>Вход в аккаунт</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div class="form_center" style="height: 80vh; align-items: center;">
            <form id="login" method="POST" action="{{ route('login') }}">
                <div class="card">
                    <div class="login_title">
                        <h3>Вход в аккаунт</h3>
                    </div>
                    <div class="login_fields">
                        <div class="login">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Email">
                        </div>
                        <div class="password">
                            <div class="signs">
                                <label for="password">Пароль</label>
                                <a href="{{ route('password.request') }}">
                                    Забыл пароль
                                </a>
                            </div>
                            <input id="password" type="password" name="password" required placeholder="Пароль">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="action_login">
                            <div class="remember">
                                <span>Запомнить меня</span>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                            </div>
                            <div class="register">
                                <a href="{{ route('register') }}">Создать аккаунт</a>
                            </div>
                        </div>
                        <div class="center_button">
                            <button type="submit">Войти</button>
                        </div>
                    </div>
                    <div class="login_footer">
                        Аккаунт позволяет не заполнять данные, когда Вы готовы вот-вот купить товар, а так же позволит
                        учавствовать в розыгрышах!
                    </div>
                    @csrf
            </form>
        </div>
    </div>
@endsection
