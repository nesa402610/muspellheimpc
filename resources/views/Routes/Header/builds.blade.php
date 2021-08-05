@extends ('template')

@section('head')
    <title>Сборки</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div class="title-center">
            <h2>Готовые компьютеры</h2>
        </div>
        <div id="pc_builds">
            @foreach ($builds as $build)
                <div class="build">
                    <div>
                        <div class="build_header">
                            {{ $build->name }}
                        </div>
                        <div class="build_content">
                            <div class="hardware">
                                @foreach ($build->hardwares->take(6) as $hardware)
                                    <div><a
                                            href="{{ route('hardwares.show', $hardware->id) }}">{{ $hardware->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="build_footer">
                            <div class="price">
                                {{ $build->price }} рублей
                            </div>
                            <form class="form_buy" action="{{ route('cart.add', ['id' => $build->id]) }}" method="post">
                                @CSRF
                                <button type="submit" class="buy-button" name="button">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
