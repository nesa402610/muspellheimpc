@extends('template')

@section('head')
    <title>Периферия</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div class="title-center">
            <h1>Периферия</h1>
        </div>
        <div class="grid_row" style="grid-template-columns: repeat(7, 1fr)">
            @foreach ($accessories as $accessory)
                @if ($accessory->product->visibility == 1)
                    <div id="card" class="buying_card">
                        <div>
                            <div class="hardware_title">
                                <a
                                    href="{{ route('accessoryView', $accessory->id) }}">{{ $accessory->product->name }}</a>
                            </div>
                            <div class="hardware_content">

                            </div>
                            <div class="hardware_footer">
                                <div class="price">
                                    {{ $accessory->product->price }} рублей
                                </div>
                                <form class="form_buy" action="{{ route('cart.add', ['id' => $accessory->product->id]) }}"
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
@endsection
