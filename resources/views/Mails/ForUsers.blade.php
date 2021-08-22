<div class="page">
    <div class="content">
        <div class="logo header">
            <h1>
                MUSPELLHEIMPC LOGO
            </h1>
        </div>
        <div class="midcontent">
            <div class="header title">
                <h2>
                    Заказ был получен
                </h2>
            </div>
            <div class="information">
                Это письмо было получено на {{ $email }}, потому что Вы оформили заказ на сайте muspellheimpc.pw.
                В скором времени мы свяжемся с Вами, чтобы подветрдить заказ. Ожидайте звонка!
            </div>
            <div class="cart-info">
                <div class="title">
                    Список покупок
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Стоимость</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart->products as $product)
                                <tr>
                                    <th>
                                        {{ $loop->iteration }}
                                    </th>
                                    <th>
                                        {{ $product->name }}
                                    </th>
                                    <th>
                                        {{ $product->pivot->quantity }}
                                    </th>
                                    <th>
                                        {{ $product->getPriceForQuantity(), 2, '.', '' }}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                    {{ number_format($cart->GetFullPrice(), 2, '.', '') }}
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .title {
        text-align: center;
    }
</style>
