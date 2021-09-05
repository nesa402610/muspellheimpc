@extends('admin.templates.edit')


{{-- @section('preview')
<div id="card" style="width: 25rem">
    <div class="card_header">
        {{ $category->name }}
    </div>
    <div class="card_content">
        <img src="/storage/category_img/{{ $category->image }}" alt="">
    </div>
</div>
@endsection --}}

@section('add')
<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
    <div class="admin_create_pc">
        <div>
            <label>Название</label>
            <input name="name" type="text" placeholder="Название" value="{{ $category->name }}" required>
        </div>
        <div>
            <label>Видимость</label>
            <select name="visibility" required>
                <option @if ($category->visibility === 1)
                    selected
                @endif value="1">Видим</option>
                <option @if ($category->visibility === 0)
                    selected
                @endif value="0">Не видим</option>
            </select>
        </div>
        <div>
            <label>Изображение</label>
            <input name="image" type="file" placeholder="image">
        </div>
    <button type="submit">Обновить</button>
</form>
@endsection
