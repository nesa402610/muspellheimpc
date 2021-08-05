@extends('admin.master')

@section('head-title')
    <title>Комплектующие</title>
@endsection

@section('content')
    <table>
        <thead>
            <tr>
                <th>Номер</th>
                <th>product_id</th>
                <th>Имя</th>
                <th>description</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Категория</th>
                <th>Бренд</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{ route('products.create') }}">
                <button type="submit">Добавить продукт</button>
                </form>
            </tr>
            @foreach ($products as $products)
                <tr>
                    <th>
                        {{ $products->id }}
                    </th>
                    <th>
                        {{ $products->name }}
                    </th>
                    <th>
                        {{ $products->price }}Р
                    </th>
                    <th>{{ $products->quantity }}</th>
                    {{-- <th>{{ $hardware->category->name }}</th> --}}
                    <th>{{ $products->brand->name }}</th>
                    <th>
                        <div>
                            <a href="{{ route('hardwares.create') }}">Создать</a>
                            <a href="{{ route('hardwares.edit', $hardware->id) }}">Редактировать</a>
                            <form action="{{ route('hardwares.destroy', $hardware->id) }}" method="POST">
                                @csrf
                                <button type="submit">Удалить</button>
                                {{ method_field('delete') }}
                            </form>
                        </div>
                    </th>
                    <th></th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
