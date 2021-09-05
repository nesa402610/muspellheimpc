@extends('template')

@section('head')
    <title>{{ $hardware->product->name }}</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div id="product_preview">
            <div class="showroom">
                <div class="img">
                    {{-- {{ dump(($hardware->product->images)) }}
                    {{ dump(count($hardware->product->images)) }}
                    {{ dd(is_null($hardware->product->images)) }} --}}
                    @if (count($hardware->product->images) >! 0)
                        <img class="visible" src="/storage/products_img/{{ $hardware->product->image }}" alt="">
                    @else
                        <img data-id="1" class="visible" src="/storage/products_img/{{ $hardware->product->image }}" alt="">
                        @foreach ($hardware->product->images as $image)
                            <img data-id={{ $loop->iteration+1 }} src="/storage/{{ $image->image_name }}" alt="">
                        @endforeach
                    @endif
                </div>
                <div class="scroll">
                    {{-- <div class="scroll-arrow">
                        <a>
                            <i class="fas fa-arrow-left"></i>
                        </a>
                    </div> --}}
                    @if (count($hardware->product->images) !== 0)
                    <div class="scroll-selector">
                        <ul>
                            @for ($i = 0; $i < count($hardware->product->images)+1; $i++)
                            <li  data-id={{ $i+1 }}>
                                <a @if ($i === 0) class='baka' @endif></a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                    @endif
                    {{-- <div class="scroll-arrow">
                        <a>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="information">
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
                        <div class="price">
                            {{ number_format($hardware->product->price, 0, ',', ' ') }} ₽
                        </div>
                        <form class="form_buy" action="{{ route('cart.add', ['id' => $hardware->product->id]) }}"
                            method="post">
                            @CSRF
                            <button type="submit" class="buy-button" name="button">В корзину</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
