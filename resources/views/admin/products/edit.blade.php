@extends('admin.templates.edit')


@section('route_name')
    {{ route('products.update', $product->id) }}
@endsection

@section('thead')
    {{ method_field('PUT') }}
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Бренд</th>
        <th>Количество</th>
        {{-- <th>Код</th> --}}
        {{-- <th>Глобальная категория</th> --}}
        <th>Видимость</th>
        <th>Дата создания</th>
        <th>Дата обновления</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input name="name" type="text" placeholder="{{ $product->name }}" value="{{ $product->name }}">
        </th>
        <th>
            <input type="text" name="description" placeholder="Описание" value="{{ $product->description }}">
        </th>
        <th>
            <input name="price" type="number" placeholder="Цена" value="{{ $product->price }}">
        </th>
        <th>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </th>
        <th>
            <select name="brand">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </th>
        <th>
            <input name="quantity" type="number" placeholder="Количество" value="{{ $product->quantity }}">
        </th>
        {{-- <th>
            <input type="text" name="code" placeholder="Код" value="{{ $product->code }}">
        </th> --}}
        {{-- <th>
            <input type="text" name="global_category" placeholder="Глобальная категория" value="{{ $product->Global_category }}">
        </th> --}}
        <th>
            <input type="text" name="visibility" placeholder="Видимость" value="{{ $product->visibility }}">
        </th>
        <th>
            <input value="{{ $product->created_at }}">
        </th>
        <th>
            <input value="{{ $product->updated_at }}">
        </th>
    </tr>
@endsection
