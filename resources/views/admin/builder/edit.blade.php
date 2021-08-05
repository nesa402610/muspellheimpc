@extends('admin.templates.edit')


@section('route_name')
    {{ route('pcbuilders.update', $build->id) }}
@endsection

@section('thead')
{{ method_field('PUT') }}
    <tr>
        <th>Название</th>
    </tr>
@endsection

@section('tbody')
    <tr>
        <th>
            <input name="name" type="text" placeholder="Название" value="{{ $build->product->name }}">
        </th>
        <th><input name="description" type="text" placeholder="description" value="{{ $build->product->description }}"></th>
        <th><input name="quantity" type="text" placeholder="quantity" value="{{ $build->product->quantity }}"></th>
        <th><input name="price" type="text" placeholder="price" value="{{ $build->product->price }}"></th>
        <th><input name="image" type="file" placeholder="image"></th>
        <th><input name="realese_date" type="date" placeholder="realese_date" value="{{ $build->product->realese_date }}"></th>
        <th><input name="visibility" type="text" placeholder="visibility" value="{{ $build->product->visibility }}"></th>
        <th><select name="tier" placeholder="tier">
            <option value="1">Бюджетные</option>
            <option value="2">Средние</option>
            <option value="3">Игровые</option>
            <option value="4">В столе</option>
        </select></th>
        <th><input name="global_category" type="text" placeholder="g_cat" value="{{ $build->product->global_category }}"></th>
        {{-- <th><select name="hardware[]" multiple>
            @foreach ($hardwares as $hardware)
                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
            @endforeach
        </select></th> --}}
    </tr>
@endsection
