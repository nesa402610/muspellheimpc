@extends('admin.templates.edit')


@section('route_name')
    {{ route('brands.update', $brand->id) }}
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
            <input name="name" type="text" placeholder="{{ $brand->name }}" value="{{ $brand->name }}" required>
        </th>
        <th>
            <input name="image" type="file" required src="/storage/products_img/{{ $brand->image }}">
        </th>
    </tr>
@endsection

@section('preview')

@endsection
