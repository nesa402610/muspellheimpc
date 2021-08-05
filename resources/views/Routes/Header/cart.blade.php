@extends ('template')

@section('head')
    <title>Home</title>
@endsection

@section('content')
    <div id="size-cutter">
        <h1>Ваша корзина</h1>
        @if ($cart !== false && $cart->pc_builds->count() !== 0)
            <form action="{{ route('cart.clear') }}" method="post" class="text-right">
                @csrf
                <button type="submit" class="btn btn-outline-danger mb-4 mt-0">
                    Очистить корзину
                </button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>Наименование</th>
                        <th>Цена</th>
                        <th>Кол-во</th>
                        <th>Стоимость</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->pc_builds as $pc_build)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pc_build->name }} </td>
                            <td>{{ number_format($pc_build->price, 2, '.', '') }}</td>
                            <td>
                                <form action="{{ route('cart.minus', ['id' => $pc_build->id]) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </form>
                                <span class="mx-1">{{ $pc_build->pivot->quantity }}</span>
                                <form action="{{ route('cart.add', ['id' => $pc_build->id]) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    <button type="submit" class="m-0 p-0 border-0 bg-transparent">
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ number_format($pc_build->getPriceForQuantity(), 2, '.', '') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', ['id' => $pc_build->id]) }}" method="post">
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
                        <th colspan="4" class="text-right">Итого</th>
                        <th>{{ number_format($cart->GetFullPrice(), 2, '.', '') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            <div>
                <a href="{{ route('cart.confirmation') }}" id="confirmation-order-btn">
                    Оформить заказ
                </a>
            </div>
        @else
            <p>Ваша корзина пуста</p>
        @endif
    </div>
@endsection
