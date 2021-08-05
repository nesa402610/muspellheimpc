@extends('admin.templates.edit')


@section('route_name')
    {{ route('hardwares.update', $hardware->id) }}
@endsection

@section('thead')
    {{ method_field('PUT') }}
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
        <th>Категория</th>
        <th>Бренд</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input name="name" type="text" placeholder="{{ $hardware->name }}" value="{{ $hardware->name }}">
        </th>
        <th>
            <input name="price" type="number" placeholder="Цена" value="{{ $hardware->price }}">
        </th>
        <th>
            <input name="quantity" type="number" placeholder="Количество" value="{{ $hardware->quantity }}">
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
    </tr>
@endsection
