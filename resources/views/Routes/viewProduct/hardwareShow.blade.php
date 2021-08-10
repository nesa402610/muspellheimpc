@extends('template')

@section('head')
    <title>{{ $hardware->product->name }}</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div id="product_preview">
            <div class="showroom">
                <div class="img">
                    <img src="/storage/products_img/{{ $hardware->product->image }}" alt="">
                </div>
                {{-- <div class="scroll">
                    <div class="scroll-arrow">
                        <a>
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="scroll-selector">
                        <ul>
                            <li><a>

                                </a></li>
                            <li><a>

                                </a></li>
                            <li><a>

                                </a></li>
                            <li><a>

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
            <div class="content">
                <div class="title">
                    <h1>{{ $hardware->product->name }}</h1>
                </div>
                <div class="main">
                    {{ $hardware->product->description }}
                </div>
            </div>
            <div class="footer flex">
                <div class="Vflex gapA">
                    <div class="buy-button">
                        {{ $hardware->product->price }} рублей
                    </div>
                    <form class="form_buy" action="{{ route('cart.add', ['id' => $hardware->product->id]) }}"
                        method="post">
                        @CSRF
                        <button type="submit" class="buy-button" name="button">В корзину</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
