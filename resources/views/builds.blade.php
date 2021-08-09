@extends('template')

@section('head')
    <title>Готовые компьютеры | Сборки | MuspellheimPC</title>
@endsection
<style>
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
            <div class="title-center">
                <h2>Готовые компьютеры</h2>
            </div>
            <div class="grid_row">
                @foreach ($builds as $build)
                    <div id="card" class="buying_card">
                        <div style="background-image: url('/storage/products_img/{{ $build->product->image }}')">
                            <div class="build_header">
                                <a href="{{ route('buildView', $build->id) }}"> {{ $build->product->name }}</a>
                            </div>
                            <div class="build_content">
                                <div class="hardware">

                                    @foreach ($build->hardwares->take(6) as $hardware)
                                        <div>
                                            <a href="{{ route('hardwareView', $hardware->id) }}">{{ $hardware->product->name }}
                                            </a>
                                        </div>
                                    @endforeach
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
