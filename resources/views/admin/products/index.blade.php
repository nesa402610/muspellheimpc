@extends('admin.master')

@section('head-title')
    <title>Комплектующие</title>
@endsection

@section('content')

    <table>
        <thead>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Категория</th>
                <th>Бренд</th>
                <th>Действия</th>
                <th>Quick action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{ route('products.create') }}">
                <button type="submit">Добавить продукт</button>
                </form>
            </tr>
            @foreach ($products as $product)
                <tr @if ($product->visibility == 1)
                    class="admin_product_visible"
                @endif>
                    <th>
                        {{ $product->id }}
                    </th>
                    <th>
                        {{ $product->name }}
                    </th>
                    <th>
                        {{ $product->price }}Р
                    </th>
                    <th>{{ $product->quantity }}</th>
                    <th>{{ $product->category->name }}</th>
                    <th>{{ $product->brand->name }}</th>
                    <th>
                        <div>
                            <a href="{{ route('products.create') }}">Создать</a>
                            <a href="{{ route('products.edit', $product->id) }}">Редактировать</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit">Удалить</button>
                                {{ method_field('delete') }}
                            </form>
                        </div>
                    </th>
                    <th>
                        <form action="{{ route('products.vis_change', $product->id) }}" method="POST">
                            @csrf
                            <button class="submit" >
                                Изменнить видимость
                            </button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <style>
        .admin_product_visible {
         background: hsl(245deg 75% 60%) !important;
        }
    </style>
@endsection
