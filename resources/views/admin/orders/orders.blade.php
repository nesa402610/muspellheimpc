@extends('admin.master')

@section('head-title')
    <title>Заказы</title>
@endsection

@section('content')
    <div id="content">
        <div>
            <a href="">Не завершенные заказы</a>
            <a href="">Завершенные заказы</a>
            <a href="">Все заказы</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $order->id }}</th>
                    <th>{{ $order->name }}</th>
                    <th>{{ $order->phone }}</th>
                    <th>{{ $order->email }}</th>
                    <th>
                        <form action="{{ route('admin.order', $order->id) }}">
                            <button type="submit">
                                Открыть
                            </button>
                        </form>
                    </th>
                    <th style="padding-left: 1rem;">
                        <form action="{{ route('admin.endProcessing', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit">Завершить</button>
                           </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
