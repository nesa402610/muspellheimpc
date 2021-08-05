@extends('template')

@section('head')
    <title>{{ $accessory->product->name }}</title>
@endsection

@section('content')
    <div id="size-cutter">
        <div id="build">
            <div class="showroom">
                <div class="scroll">
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
                </div>
            </div>

            <h1>{{ $accessory->product->name }}</h1>
            <div основной блок с описанием, картинками и прочим>
                {{ $accessory->product->description }}
            </div>
            <div здесь должны быть графики или тексты компы +-, что он может>
                <div class="grid_row">
                    {{-- @foreach ($build_hardwares as $hardware)
                    <div id="card">
                        <div class="hardware_image">
                            <img src="" alt="">
                            <h4>{{ $hardware->product->name }}</h4>
                        </div>

                    </div>
                    @endforeach --}}

                </div>
            </div>
            <h1>{{ $accessory->product->price }}</h1>
        </div>
    </div>
@endsection
