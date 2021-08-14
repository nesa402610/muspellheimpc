@extends('admin.templates.edit')

@section('add')
    <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="{{ $brand->name }}" value="{{ $brand->name }}" required>
            </div>
            <div class="admin_create_pc">
                <div>
                    <label>Изображение</label>
                    <input name="image" type="file" required src="/storage/products_img/{{ $brand->image }}">
                </div>
            </div>
        </div>
    </form>
@endsection
