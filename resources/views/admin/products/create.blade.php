@extends('admin.templates.create')


@section('route_name')
    {{ route('products.store') }}
@endsection

@section('thead')
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Бренд</th>
        <th>Количество</th>
        <th>Изображение</th>
        <th>дата релиза</th>
        <th>Куда</th>
        <th>Видимость</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input required name="name" type="text" placeholder="Название">
        </th>
        <th>
            <input required name="description" type="text" placeholder="Описание">
        </th>
        <th>
            <input required name="price" type="number" placeholder="Цена">
        </th>
        <th>
            <select required name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </th>
        <th>
            <select required name="brand">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach

            </select>
            {{-- <input name="brand" type="text" placeholder="Бренд"> --}}
        </th>
        <th>
            <input required name="quantity" type="number" placeholder="Количество" value="0">
        </th>
        <th>
            <input required name="image" type="file" placeholder="image" value="0">
        </th>
        <th>
            <input required name="date" type="date" placeholder="image" value="<?php echo date('Y-m-d');?>">
        </th>
        <th>
            <select required name="g_cat">
                <option value="2">hardware</option>
                <option value="3">accessory</option>
            </select>
        </th>
        <th>
            <select required name="visibility">
                <option value="1">Видим</option>
                <option selected value="0">Скрыт</option>
            </select>
        </th>
    </tr>
@endsection
