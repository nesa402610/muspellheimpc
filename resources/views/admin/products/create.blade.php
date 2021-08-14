@extends('admin.templates.create')

@section('add')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="ASUS ROG STRIX GTX 1080 ti OC 8GB (1895 Mhz, 7255 Mzh)">
            </div>
            <div>
                <label>Короткое название</label>
                <input name="shortname" type="text" placeholder="ASUS GTX 1080 ti">
            </div>
            <div>
                <label>Описание</label>
                <input name="description" type="text" placeholder="description">
            </div>
            <div>
                <label>Цена</label>
                <input name="price" type="text" placeholder="price">
            </div>
            <div>
                <label">Категория</label>
                <select required name="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label">Бренд</label>
                <select required name="brand">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Количество</label>
                <input name="quantity" type="text" placeholder="quantity">
            </div>
            <div>
                <label>Изображение</label>
                <input name="image" type="file" placeholder="image">
            </div>
            <div>
                <label>Дата</label>
                <input name="realese_date" type="date" placeholder="realese_date" value="<?php echo date('Y-m-d');?>">
            </div>
            <div>
                <label>Куда</label>
                <select required name="g_cat">
                    <option value="2">Комплектующие</option>
                    <option value="3">Периферия</option>
                </select>
            </div>
            <div>
                <label>Видимость</label>
                <select name="visibility" type="text" placeholder="visibility">
                    <option value="1">Видим</option>
                    <option value="0">Скрыт</option>
                </select>
            </div>
        </div>
        <button type="submit">Создать ошубку</button>
    </form>
@endsection
