<style>
    #header {
        display: flex;
    }
</style>
<header>
    <div id="size-cutter">
        <div id="header" style="height: 60px;">
            <div class="header_block">
                <div class="nav-item">
                    <a href="/">На сайт</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('products.index') }}">Продукты</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('categories.index') }}">Категории</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('brands.index') }}">Бренды</a>
                </div>

                <div class="nav-item">
                    <a href="{{ route('admin.orders') }}">Заказы</a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('pcbuilders.index') }}">PC BUILDER</a>
                </div>
            </div>
            <div class="header_block">
                @auth
                    @if (Auth::user()->isAdmin())
                        <div class="nav-item">
                            <a href="{{ route('admin.orders') }}">Админ</a>
                        </div>
                    @endif
                @endauth

                <div class="nav-item">
                    @if (auth::check())
                        <a class="username">{{ auth::user()->name }}</a>
                        <div class="dropdown">
                            <div class="nav-item">
                                <a href="{{ route('userprofile') }}">Профиль</a>
                            </div>
                            <div class="nav-item">
                                <a href="{{ route('userOrders') }}">Мой заказы</a>
                            </div>
                            <div class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <label for="logout_btn"><a>Выйти</a></label>
                                    <button id="logout_btn" type="submit" hidden name="button"></button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}">Войти</a>
                    @endif
                </div>
                <div class="nav-item">
                    <a href="{{ route('cart') }}">Корзина</a>
                </div>
                <div class="nav-item">
                    <a href="">+7 (999) 1488-BAN</a>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
tr:nth-child(even) {
    background: hsl(355deg 80% 40%);
}
tr:nth-child(odd) {
    background: hsl(355deg 80% 60%);
}
</style>
