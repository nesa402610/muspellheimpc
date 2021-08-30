@extends('template')

@section('head')
    <title>Регистрация</title>
@endsection

@section('content')
    <div class="size-cutter">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form_center" style="height: 80vh; align-items: center;">
            <form id="login" method="POST" action="{{ route('register') }}">
                <div class="card">
                    <div class="login_title">
                        <h3>Регистрация аккаунта</h3>
                    </div>
                    <div class="login_fields">
                        <div class="name">
                            {{-- <label for="name">Имя</label> --}}
                            <input id="name" type="name" name="name" value="{{ old('name') }}" required placeholder="Имя">
                        </div>
                        <div class="phone">
                            {{-- <label for="phone">Телефон</label> --}}
                            <input id="phone" type="phone" name="phone" required placeholder="Телефон">
                            <label class="tips">Введите номер в виде: 7123456789</label>
                        </div>
                        <div class="login">
                            {{-- <label for="email">Email</label> --}}
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                placeholder="Email">
                        </div>
                        <div class="password">
                            {{-- <label for="password">Пароль</label> --}}
                            <input id="password" type="password" name="password" required placeholder="Пароль">
                            {{-- <label for="password">Повторите пароль</label> --}}
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password" placeholder="Повторите пароль">
                        </div>
                    </div>
                    <div class="submit">
                        <div class="center_button">
                            <button type="submit">Зарегистрироваться</button>
                        </div>
                        <div class="action_register">
                            <div class="to_login">
                                <a href="{{ route('login') }}">Уже есть аккаунт?</a>
                            </div>
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
                   <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
