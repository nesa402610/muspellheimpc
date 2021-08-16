@extends('admin.master')

@section('head-title')
    <title>Комплектующие</title>
@endsection

@section('content')
    <style>
        th {
            padding: 0 1rem;
        }

    </style>
    <table style="border-collapse: unset; border-spacing: 0px 6px;">
        <thead>
            <tr>
                <th>Номер</th>
                {{-- <th>ID</th> --}}
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
                <tr @if ($product->visibility == 1) class="admin_product_visible" @endif>
                    <th>
                        {{ $loop->iteration }}
                    </th>
                    {{-- <th>
                        {{ $product->id }}
                    </th> --}}
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
                            <button type="submit" data-id="{{ $product->id }}" class="admin delete-btn">Удалить</button>
                            {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                {{ method_field('delete') }}
                            </form> --}}
                        </div>
                    </th>
                    <th>
                        <form action="{{ route('products.vis_change', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit">
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
    <script>
        $('.admin.delete-btn').click(function(e) {
            e.preventDefault();
            var dataid = $(this).attr('data-id');
            console.log(dataid);
            $('.admin_modular').css('display', 'flex');
            $('.admin_modular .admin.confirm-action form').attr('action',
                "https://muspellheimpc.pw/admin/products/" + dataid);

        });

    </script>
@endsection
