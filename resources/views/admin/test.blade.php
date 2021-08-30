@extends('admin.master')

@section('content')
    <div class="flex main">
        @foreach ($dir as $d)
            <div class="dir">
                <h2 style="text-align: center">
                    {{ $d }}
                </h2>
                <div class="images">
                    @foreach (storage::disk('public')->files($d) as $image)
                        <div>
                            <img src="/storage/{{ $image }}" alt="">
                            <div class="delete-btn-abs">
                                <div>
                                    <form action="{{ route('admin.filedelite', $image) }}" method="POST">
                                        @csrf
                                        <button type="submit">
                                            del
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr class="bigus">
            </div>
        @endforeach

    </div>
    <style>
        .delete-btn-abs {
            position: absolute;
        }
        .delete-btn-abs > div{
            background-color: #750b0b;
            padding: .3rem;
            position: absolute;
            bottom: 0;
        }

        .flex.main{
            flex-direction: column;
            gap: 1rem;
        }

        .images {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        img {
            height: auto;
            width: 200px;
        }

    </style>
@endsection
