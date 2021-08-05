<header>
    <div id="size-cutter">
        <div id="header">
            <div class="header_block">
                <a href="/">
                    <img src="{{ asset('logox280.png') }}" alt="Логотип" style="width: 280px">
                </a>
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
                    <a href="{{ route('about') }}">Контакты</a>
                </div>
                {{-- <div class="nav-item">
                    <a href="{{ route('sendEmail') }}">Контакты</a>
                </div> --}}
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
                    {{-- <a href="">+7 (915) 431-86-25</a> --}}
                    <a href="">+7 (402) 666-10-90</a>
                </div>
            </div>
        </div>
        <div id="mobile_header">
            @include('includes.header-mobile')
        </div>
    </div>
</header>
