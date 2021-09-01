@extends('admin.templates.edit')

@section('add')
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="Название" value="{{ $product->name }}" required>
            </div>
            <div>
                <label>Короткое название</label>
                <input name="shortname" type="text" value="{{ $product->shortname }}" placeholder="Короткое имя" required>
            </div>
            <div>
                <label>Описание</label>
                <input name="description" type="text" value="{{ $product->description }}" placeholder="description" required>
            </div>
            <div>
                <label>Цена</label>
                <input name="price" type="text" value="{{ $product->price }}" placeholder="price" required>
            </div>
            <div>
                <label">Категория</label>
                <select name="category" required>
                    @foreach ($categories as $category)
                        <option @if ($category->id === $product->category_id) selected @endif value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Бренд</label>
                <select name="brand" required>
                    @foreach ($brands as $brand)
                        <option @if ($brand->id === $product->brand_id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Количество</label>
                <input name="quantity" type="text" placeholder="quantity" value="{{ $product->quantity }}" required>
            </div>
            <div>
                <label>Изображение</label>
                <input name="image" type="file" placeholder="image">
            </div>
            <div>
                <label>Дата</label>
                <input name="realese_date" type="date" placeholder="realese_date" value="{{ $product->created_at }}" required>
            </div>
            <div>
                <label>Куда</label>
                <select name="g_cat" required>
                    <option @if ($product->global_category === 2) selected @endif value="2">Комплектующие</option>
                    <option @if ($product->global_category === 3) selected @endif value="3">Периферия</option>
                </select>
            </div>
            <div>
                <label>Видимость</label>
                <select name="visibility" type="text" placeholder="visibility" required>
                    <option @if ($product->visibility === 1) selected @endif value="1">Видим</option>
                    <option @if ($product->visibility === 0) selected @endif value="0">Скрыт</option>
                </select>
            </div>
            <div>
                <label>Изображения</label>
                <input type="file" name="images[]" multiple>
            </div>
        </div>

        {{-- <div class="admin.images">
            @foreach ($img as )

            @endforeach
            <div>

            </div>
        </div> --}}
        <button type="submit">Обновить</button>
    </form>
@endsection
