@extends('admin.templates.create')


@section('route_name')
    {{ route('brands.store') }}
@endsection

@section('thead')
    <tr>
        <th>Название</th>
        <th>Изображение</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input name="name" type="text" placeholder="Название" required>
        </th>
        <th>
            <input name="image" type="file" required>
        </th>
    </tr>
@endsection
