@extends('template')

@section('head')
    <title>Подтверждение заказа</title>
@endsection


@section('content')
    <div id="size-cutter">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="inline_together">
            <div class="final_click">
                <h4>Какие-то данные ввести</h4>
                <form style="width: 100%" id="form-classic" action="{{ route('cart.confirm') }}" method="post">
                    @csrf
                    <span>Имя: </span>
                    <input required type="name" name="name" required placeholder="Введите своё имя" @auth
                        value="{{ auth::user()->name }}" @endauth>
                    <span>Email: </span>
                    <input required type="email" name="email" required placeholder="Введите свой Email" @auth
                        value="{{ auth::user()->email }}" @endauth>
                    <span>Телефон: </span>
                    <input required id="phone" type="tel" name="phone" required placeholder="71234567890" @auth
                        value="{{ auth::user()->phone }}" @endauth>
                    <span>Адрес: </span>
                    <input required type="text" placeholder="Адрес" required name="adress" @auth value="{{ auth::user()->adress }}"
                        @endauth>
                    <button type="submit" name="button">Подтвердить заказ</button>
                </form>
            </div>
            <div class="Wcart">
                <h4>К покупке</h4>
                <div class="Wcart-details">
                    <table>
                        <thead class="Wcart-head">
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                        <tbody class="Wcart-item">
                            @foreach ($cart->products as $product)
                            <tr>
                                <td class="Wcart-item_count">{{ $loop->iteration }}</td>
                                <td class="Wcart-item_name">{{ $product->name }}</td>
                                <td class="Wcart-item_quantity">{{ $product->pivot->quantity }} ед.</td>
                                <td class="Wcart-item_price">{{ number_format($product->getPriceForQuantity(), 2, '.', '') }} ₽</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="Wcart-summary">
                    К оплате: {{ number_format($cart->GetFullPrice(), 2, '.', '') }} ₽
                </div>
            </div>
        </div>
    </div>
@endsection
