@extends('admin.templates.create')

@section('add')
    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="Название" required>
            </div>
            <div class="admin_create_pc">
                <div>
                    <label>Изображение</label>
                    <input name="image" type="file" required>
                </div>
            </div>
        </div>
    </form>
@endsection

