@extends('template')

@section('head')
    <title>MuspellheimPC | Интернет-магазин компьютеров и компьютерной техники</title>
    <META name="robots" content="all">
@endsection


<style>
    span {
        font-size: 1.2rem;
        font-weight: bold;
    }
</style>
@section('content')
    <div class="banner">
        <div>
            <div class="banner_images">
                <div data-id="1" class="banner_image"></div>
                {{-- <div data-id="2" class="banner_image"></div>
                <div data-id="3" class="banner_image"></div>
                <div data-id="4" class="banner_image"></div> --}}
            </div>
            {{-- <div class="scroll">
                <div class="scroll-arrow">
                    <a>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="scroll-selector">
                    <ul>
                        <li><a data-id="1" class="baka">

                            </a></li>
                        <li><a data-id="2">

                            </a></li>
                        <li><a data-id="3">

                            </a></li>
                        <li><a data-id="4">

                            </a></li>
                    </ul>
                </div>
                <div class="scroll-arrow">
                    <a>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="products">
        <div id="size-cutter">
            <div Строка продуктов>
                <div id="card">
                    <div Картинка и прочее>
                        <a href="{{ route('builds') }}">
                            <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                        </a>
                    </div>
                    <div Текст>
                        <h3>
                            Сборки
                        </h3>
                    </div>
                </div>
                <div id="card">
                    <div Картинка и прочее>
                        <a href="">
                            <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                        </a>
                    </div>
                    <div Текст>
                        <h3>
                            Сборки в столе
                        </h3>
                    </div>
                </div>
                <div id="card">
                    <div Картинка и прочее>
                        <a href="{{ route('categories') }}">
                            <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                        </a>
                    </div>
                    <div Текст>
                        <h3>
                            Комплектующие
                        </h3>
                    </div>
                </div>
                <div id="card">
                    <div Картинка и прочее>
                        <a href="{{ route('accessories') }}">
                            <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                        </a>
                    </div>
                    <div Текст>
                        <h3>
                            Периферия
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="products">
        <div id="size-cutter">
            <div id="builds_index">
                <h3>Компьютерные сборки</h3>
                <div class="row" style="justify-content: space-between">
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('buildsTier', 'gaming') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Игровые
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('buildsTier', 'bit') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Сборки в столе
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('buildsTier', 'middle') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Среднего уровня
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('buildsTier', 'office') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Базового уровня
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div Вторая строка>
                <h3>Комплектующие</h3>
                <div class="row" style="justify-content: space-between">
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('buildsTier', 'middle') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Видеокарты
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Материнские платы
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('hardware') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Процессоры
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('accessories') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Накопители
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('hardware') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Смотреть все
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div Третья строка>
                <h3>Игровая периферия</h3>
                <div class="row" style="justify-content: space-between">
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('builds') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Клавиатуры
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Мышки
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('hardware') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Мониторы
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_header" Картинка и прочее>
                            <a href="{{ route('accessories') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Наушники
                            </span>
                        </div>
                    </div>
                    <div id="card">
                        <div class="card_content" Картинка и прочее>
                            <a href="{{ route('accessories') }}">
                                <img src="https://cdn.originpc.com/img/gaming-desktops.jpg" alt="">
                            </a>
                        </div>
                        <div class="card_footer" Текст>
                            <span>
                                Смотреть все
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="from-order-to-delivery">
        <div id="size-cutter">
            <div id="order-buy-delivery">
                <div id="choose" class="TEST-CHANGE-ME">
                    <span>Выбрал</span>
                </div>
                <div>Arrow-right</div>
                <div id="order" class="TEST-CHANGE-ME">
                    <span>Оформил</span>
                </div>
                <div>Arrow-right</div>
                <div id="delivery" class="TEST-CHANGE-ME">
                    <span>Получил</span>
                </div>
                <div>Arrow-right</div>
                <div id="buy" class="TEST-CHANGE-ME">
                    <span>Оплатил</span>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
