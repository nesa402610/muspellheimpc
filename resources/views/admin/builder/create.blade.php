@extends('admin.templates.create')


@section('route_name')
    {{ route('pcbuilders.store') }}
@endsection

@section('thead')
    <tr>
        <th>Название</th>
        <th>Описание</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Изображение</th>
        <th>Дата релиза</th>
        <th>Видимость</th>
        <th>Вид компа</th>
        <th>комплектующие</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input name="name" type="text" placeholder="Название">
        </th>
        <th><input name="description" type="text" placeholder="description"></th>
        <th><input name="quantity" type="text" placeholder="quantity"></th>
        <th><input name="price" type="text" placeholder="price"></th>
        <th><input name="image" type="file" placeholder="image"></th>
        <th><input name="realese_date" type="date" placeholder="realese_date"></th>
        <th><input name="visibility" type="text" placeholder="visibility"></th>
        <th><select name="tier" placeholder="tier">
            <option value="1">Бюджетные</option>
            <option value="2">Средние</option>
            <option value="3">Игровые</option>
            <option value="4">В столе</option>
        </select></th>
        {{-- <th><input name="global_category" type="text" placeholder="g_cat"></th> --}}
        <th><select name="hardware[]" multiple>
            @foreach ($hardwares as $hardware)
                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
            @endforeach
        </select></th>
    </tr>
@endsection
