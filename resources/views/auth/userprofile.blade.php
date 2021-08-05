@extends('template')

@section('head')
    <title>Профиль</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div class="userprofile_data">
            <div class="userinfo">
                <h4>Данные профиля</h4>
                <div class="userinfo_fields">
                    <div class="username">
                        <span>Имя:</span>
                        {{ auth::user()->name }}
                    </div>
                    <div class="phone">
                        <span>Номер телефона:</span>
                        +{{ auth::user()->phone }}
                    </div>
                    <div class="adress">
                        <span>Адрес:</span>
                        <input form="update__userinfo" autofocus id="adress" name="adress" type="text"
                            value="{{ auth()->user()->adress }}">
                    </div>
                    <div class="submit">
                        <form id="update__userinfo" method="POST" action="{{ route('update__userinfo') }}">
                            @csrf
                            <button type="submit">Обновить данные</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="userorders">
                <h4>Orders</h4>
                <div>
                    @foreach ($orders as $order)
                        {{ $order->name }}
                        {{ $order->status }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
