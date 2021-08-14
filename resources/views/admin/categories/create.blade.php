@extends('admin.templates.create')


@section('add')
<style>
    .admin_create_pc>div {
        display: flex;
    }
    .admin_create_pc input {
        width: 100%;
    }

    .admin_create_pc>div>label {
        width: 10%;
    }

    .hardwares_admin {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        align-items: baseline;
    }

    .hardwares_admin>div {
        display: flex;
    }

    .hardwares_admin>div>select {
        width: 350px;
    }

    .hardwares_admin>div>label {
        width: 30%;
        padding: 0.8rem 0;
    }

</style>
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="admin_create_pc">
        <div>
            <label>Название</label>
            <input name="name" type="text" placeholder="Название" required>
        </div>
        <div>
            <label>Изображение</label>
            <input id="image" name="image" type="file" required>
        </div>
    </div>
    <button type="submit">Создать ошубку</button>
</form>
@endsection
