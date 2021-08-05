@extends('admin.templates.create')


@section('route_name')
    {{ route('hardwares.store') }}
@endsection

@section('thead')
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
            <input name="name" type="text" placeholder="Название">
        </th>
        <th>
            <input name="description" type="text" placeholder="Описание">
        </th>
        <th>
            <input name="price" type="number" placeholder="Цена">
        </th>
        <th>
            <input name="quantity" type="number" placeholder="Количество">
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
            <input type="text" name="image" placeholder="image">
        </th>
        <th>
            <input type="text" name="realese_date" type="date" value="2017-06-01">
        </th>
    </tr>
@endsection
