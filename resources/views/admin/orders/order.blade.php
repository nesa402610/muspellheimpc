@extends('template')

@section('head-title')

@endsection

@section('content')
<div id="size-cutter">
    <div id="content">
        <div>
            <h3>Параметры заказа</h3>
            {{ $order->status }}
            {{ $order->name }}
            {{ $order->email }}
            {{ $order->phone }}
        </div>
        <div style="display: flex; flex-direction: column">
            <h3>Что входит в заказ</h3>
           @foreach ($order->products as $pc_build)
           <div>
            <a href="">{{ $pc_build->name }}</a>
            <a href="">{{ $pc_build->pivot->quantity }}</a>
            <a href="">{{ $pc_build->price }}</a>
            <a href=""> {{ $pc_build->getPriceForQuantity() }}</a>
           </div>
           @endforeach
           <form action="{{ route('admin.endProcessing', $order->id) }}" method="POST">
            @csrf
            <button type="submit">Завершить обработку заказа</button>
           </form>
           {{-- {{ dd($order->pc_builds) }} --}}
        </div>
    </div>
</div>
@endsection

