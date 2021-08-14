@extends('template')

@section('head')
    <title>Готовые компьютеры | Сборки | MuspellheimPC</title>
@endsection
<style>
    #card {
        padding: 0 !important;
    }
    #card>div {
        height: 100%;
        display: flex;
        flex-direction: column;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: right;
    }

</style>
@section('content')
    <div id="size-cutter">
        <div class="title-center">
            <h1>Готовые компьютеры</h1>
        </div>
        <div class="filter-selector_row">
            <div>
                <a href="{{ route('buildsTier', 'middle') }}">Средний уровень</a>
            </div>
            <div>
                <a href="{{ route('buildsTier', 'bint') }}">В столе</a>
            </div>
            <div>
                <a href="{{ route('buildsTier', 'gaming') }}">Игровые</a>
            </div>
            <div>
                <a href="{{ route('buildsTier', 'office') }}">Бюждетные</a>
            </div>
        </div>
        <div>
            <div class="grid_row">
                @foreach ($builds as $build)
                    <div id="card" class="buying_card">
                        <div>
                            <div class="build_header">
                                <div class="image">
                                    <img src="/storage/products_img/{{ $build->product->image }}" alt="">
                                </div>
                            </div>
                            <div class="build_content">
                                    <div class="build_title">
                                        <a href="{{ route('buildView', $build->id) }}"> {{ $build->product->name }}</a>
                                    </div>
                                <hr class="small">
                                <div class="hardware">
                                    <div GPU>
                                        <div>
                                            Видеокарта
                                        </div>
                                        <div>
                                            @if (!is_null($build->GPU1))
                                                {{ $build->GPU1->name }}
                                            @elseif (!is_null($build->GPU2))
                                                {{ $build->GPU2->name }}
                                            @endif
                                        </div>
                                    </div>
                                    <div CPU>
                                        <div>
                                            Процессор
                                        </div>
                                        @if (!is_null($build->CPU))
                                            {{ $build->CPU->name }}
                                        @endif
                                    </div>
                                    <div MB>
                                        <div>
                                            Материнская плата
                                        </div>
                                        @if (!is_null($build->MB))
                                            {{ $build->MB->name }}
                                        @endif
                                    </div>
                                    <div RAM>
                                        <div>
                                            Оперативная память
                                        </div>
                                        @if (!is_null($build->RAM))
                                            {{ $build->RAM->shortname }}
                                        @endif
                                    </div>
                                    {{-- <div DRIVE>
                                        <div>
                                            Накопитель
                                        </div>
                                        @if (!is_null($build->SSD1) or !is_null($build->SSD2) or !is_null($build->SSD3) or !is_null($build->SSD4))
                                            @if (!is_null($build->SSD1))
                                                {{ $build->SSD1->name }}
                                            @elseif (!is_null($build->SSD2))
                                                {{ $build->SSD2->name }}
                                            @elseif (!is_null($build->SSD3))
                                                {{ $build->SSD3->name }}
                                            @elseif (!is_null($SSD4))
                                                {{ $build->SSD4->name }}
                                            @endif
                                        @else
                                            @if (!is_null($build->HDD1))
                                                {{ $HDD1->name }}
                                            @elseif (!is_null($build->HDD2))
                                                {{ $build->HDD2->name }}
                                            @elseif (!is_null($build->HDD3))
                                                {{ $build->HDD3->name }}
                                            @elseif (!is_null($build->HDD4))
                                                {{ $build->HDD4->name }}
                                            @endif
                                        @endif
                                    </div>
                                    <div SPU>
                                        <div>
                                            Блок питания
                                        </div>
                                        @if (!is_null($build->SPU))
                                            {{ $build->SPU->name }}
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                            <div class="build_footer">
                                <div class="price">
                                    {{ $build->product->price }} RUB
                                </div>
                                <form class="form_buy" action="{{ route('cart.add', ['id' => $build->product->id]) }}"
                                    method="post">
                                    @CSRF
                                    <button type="submit" class="buy-button" name="button">Купить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- @include('paginator') --}}
        </div>
    </div>
@endsection
