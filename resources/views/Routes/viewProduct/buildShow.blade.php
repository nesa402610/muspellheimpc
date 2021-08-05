@extends('template')

@section('head')
    <title>{{ $build->product->name }}</title>
@endsection

@section('content')
<div id="size-cutter">
    <div id="mite_build">
        <div class="showroom">
            <div class="img">
                <img src="/storage/products_img/{{ $build->product->image }}" alt="">
            </div>
            {{-- <div class="scroll">
                <div class="scroll-arrow">
                    <a>
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
                <div class="scroll-arrow">
                    <a>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div> --}}
        </div>
        <div class="information">

                <div class="title">
                    <h1>{{ $build->product->name }}</h1>
                </div>
                <div class="description">
                    {{ $build->product->description }}
                </div>
                <div class="hardwaresInBuild" здесь должны быть графики или тексты компы +-, что он может>
                    <div class="grid_row">
                        @foreach ($build->hardwares as $hardware)
                            <div id="card">
                                <div class="card_header">
                                    <img src="/storage/products_img/{{ $hardware->product->image }}" alt="">
                                    <h4><a
                                            href="{{ route('hardwareView', $hardware->id) }}">{{ $hardware->product->name }}</a>
                                    </h4>
                                </div>
                                <div class="card_content">
                                    <h5>{{ $hardware->product->description }}</h5>
                                </div>
                                <div class="card_footer">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <h1>{{ $build->product->price }}</h1>
            </div>
        </div>
    </div>
@endsection
