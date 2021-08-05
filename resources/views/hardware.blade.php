@extends('template')

@section('head')
    <title>Комплектующие</title>
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
    <div id="hardwares">
        <div id="size-cutter">
            <div class="title-center">
                <h2>Комплектующие</h2>
            </div>
            <div class="contentaside">
                <div class="grid_row">
                    @foreach ($hardwares as $hardware)
                        @if ($hardware->product->visibility == 1)
                            <div id="card">
                                <div astyle="background-image: url('/storage/products_img/{{ $hardware->product->image }}') ">
                                    <div class="hardware_title">
                                        <a
                                            href="{{ route('hardwareView', $hardware->id . '-' . $hardware->product->slug) }}">{{ $hardware->product->name }}</a>
                                    </div>
                                    <div class="hardware_content">
                                        <img src="/storage/products_img/{{ $hardware->product->image }}" alt="">
                                    </div>
                                    <div class="hardware_footer">
                                        <div class="price">
                                            {{ $hardware->product->price }} рублей
                                        </div>
                                        <form class="form_buy"
                                            action="{{ route('cart.add', ['id' => $hardware->product->id]) }}"
                                            method="post">
                                            @CSRF
                                            <button type="submit" class="buy-button" name="button">Купить</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                {{-- @include('includes.aside_filter') --}}
            </div>
        </div>
    </div>

@endsection
