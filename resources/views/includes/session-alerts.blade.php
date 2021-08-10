@if (session()->has('success'))
<div id="modular">
    <div>
        <p>{{ session()->get('success') }}</p>
    </div>
</div>
@elseif (session()->has('accesserr'))
    <div id="modular">
        <div>
            <p>{{ session()->get('accesserr') }}</p>
        </div>
    </div>
@elseif (session()->has('cart.item.added'))
    <div id="modular">
        <div class="cart_item-added">
            <div style="color: #4e4e4e;" class="title-center bold">
                Товар добавлен в корзину
            </div>
            <div class="select">
                <a class="clickme">Продолжить покупки?</a>
                <a href="{{ route('cart') }}">Перейти в корзину</a>
            </div>
        </div>
    </div>
@endif
