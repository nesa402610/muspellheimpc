@extends('template')

@section('head')
    <title>Восстановление пароля</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div class="form_center" style="height: 80vh; align-items: center;">
            <form id="login" method="POST" action="{{ route('password.email') }}">
                <div class="card">
                    <div class="login_title">
                        <h3>Сброс пароля</h3>
                    </div>
                    <div class="login_fields">
                        <div class="login">
                            <label for="email">Email аккаунта</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="center_button">
                            <button type="submit">Восстановить пароль</button>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert"
                            style="text-align: center; font-size: 1.3rem; color: hsl(355deg 80% 60%); padding-top: 1rem;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (session('status'))
                    <div class="alert alert-success" role="alert" style="text-align: center; font-size: 1.3rem; color: hsl(355deg 80% 60%); padding-top: 1rem;">
                        {{ session('status') }}
                    </div>
                @endif
                    <div class="login_footer">
                        На указанный E-mail адрес будет выслана ссылка для восстановления пароля. Вам нужно открыть ее и
                        ввести данные в поля
                    </div>
                    @csrf
            </form>
        </div>
    </div>
@endsection
