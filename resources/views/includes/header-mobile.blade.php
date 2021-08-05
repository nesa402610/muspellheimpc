<div class="nav-item">
    <a href="/">
        <img src="{{ asset('logox280.png') }}" alt="Логотип" style="width: 225px">
    </a>
</div>
<div>
    <div id="mobile_header-menu">
        <div class="nav-item">
            <a href="{{ route('cart') }}"><i class="fas fa-cart-arrow-down"></i></a>
        </div>
        <div class="nav-item">
            <div class="dropdown_menu">
                <a class="menu"><i class="fas fa-bars"></i></a>
                <div class="dropdown">
                    <div class="nav-item">
                        <a href="{{ route('builds') }}">Сборки</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('hardware') }}">Комплектующие</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('accessories') }}">Периферия</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('userprofile') }}">Профиль</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('userOrders') }}">Мой заказы</a>
                    </div>
                    @if (auth()->check())
                    <div class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <label for="logout_btn"><a>Выйти</a></label>
                            <button id="logout_btn" type="submit" hidden name="button"></button>
                        </form>
                    </div>
                    @else
                    <div class="nav-item">
                        <a href="{{ route('login') }}">Войти</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('register') }}">Регистрация</a>
                    </div>
                    @endif
                    @auth
                        @if (auth::user()->isAdmin())
                            <div class="nav-item">
                                <a href="{{ route('admin.orders') }}">Админка</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
