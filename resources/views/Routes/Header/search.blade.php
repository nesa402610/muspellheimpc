@extends ('template')

@section('head-title')
<title>Поиск</title>
@endsection

@section('content')
<div id="size-cutter">
    {{-- @foreach ($hw as $item)
        <div>
            <a href="{{ route('hardwareView', $hw->id . '-' . $hw->product->slug) }}">{{ $hw->name }}</a>

        </div>
    @endforeach --}}
    @foreach ($p as $item)
        @if ($item->global_category === 2)
        {{-- {{ dump($item) }} --}}
        {{ $item->hardware()->id}}
            {{-- <div>
                <a href="{{ route('hardwareView', $item->hardware()->id . '-' . $item->slug) }}">{{ $hw->name }}</a>

            </div> --}}
        @endif
    @endforeach
    {{-- @foreach ($pc as $item)
        <div>
            <a href="{{ route('hardwareView', $pc->id . '-' . $pc->product->slug) }}">{{ $pc->name }}</a>

        </div>
    @endforeach
    @foreach ($ass as $item)
        <div>
            <a href="{{ route('hardwareView', $ass->id . '-' . $ass->product->slug) }}">{{ $ass->name }}</a>

        </div>
    @endforeach --}}
</div>
@endsection
