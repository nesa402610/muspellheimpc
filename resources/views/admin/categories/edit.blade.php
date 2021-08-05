@extends('admin.templates.edit')


@section('route_name')
    {{ route('categories.update', $category->id) }}
@endsection

@section('thead')
    {{ method_field('PUT') }}
    <tr>
        <th>Название</th>
        <th>Изображение</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input id="name" name="name" type="text" placeholder="{{ $category->name }}" value="{{ $category->name }}">
        </th>
        <th>
            <input id="image" name="image" type="file">
        </th>
    </tr>
@endsection

@section('preview')
<div id="card" style="width: 25rem">
    <div class="card_header">
        {{ $category->name }}
    </div>
    <div class="card_content">
        <img src="/storage/category_img/{{ $category->image }}" alt="">
    </div>
</div>
@endsection
