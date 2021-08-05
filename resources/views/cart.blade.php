@extends ('template')

@section('head')
    <title>Корзина товаров</title>
@endsection

@section('content')
    <div id="size-cutter">
        <h1>Ваша корзина</h1>
        @if ($cart !== false && $cart->products->count() !== 0)
            {{-- <form action="{{ route('cart.clear') }}" method="post" class="text-right">
                @csrf
                <button type="submit" class="btn btn-outline-danger mb-4 mt-0">
                    Очистить корзину
                </button>
            </form> --}}
            <table class="cart_table table table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th colspan="2">Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Стоимость</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img style="height: 150px" src="/storage/products_img/{{ $product->image }}" alt=""></td>
                            <td>{{ $product->name }} </td>
                            <td>{{ number_format($product->price, 2, '.', '') }}</td>
                            <td>
                                <div class="cart__motto">
                                    <form action="{{ route('cart.minus', ['id' => $product->id]) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fas fa-minus-square"></i>
                                        </button>
                                    </form>
                                    <span class="mx-1">{{ $product->pivot->quantity }}</span>
                                    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ number_format($product->getPriceForQuantity(), 2, '.', '') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', ['id' => $product->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3"></th>
                        <th colspan="2" class="text-right">
                            <div id="confirmation-order-btn">
                                <a href="{{ route('cart.confirmation') }}">
                                    Оформить заказ
                                </a>
                            </div>
                        </th>
                        <th colspan="2">
                            <div class="cart_summary">
                                <div>
                                    Итого: {{ number_format($cart->GetFullPrice(), 2, '.', '') }} ₽
                                </div>
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        @else
            <p>Ваша корзина пуста</p>
        @endif
    </div>
@endsection
