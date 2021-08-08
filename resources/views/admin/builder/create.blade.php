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

@section('add')
    <style>
        .admin_create_pc>div {
            display: flex;
        }

        .admin_create_pc>div>label {
            width: 10%;
        }

        .hardwares_admin {
            display: flex;
            flex-direction: column;
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
    <h2 style="margin-top: 10rem">Работает, можешь проверять</h2>
    <form action="{{ route('pcbuilders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="Название">
            </div>
            <div>
                <label>Описание</label>
                <input name="description" type="text" placeholder="description">
            </div>
            <div>
                <label>Количество</label>
                <input name="quantity" type="text" placeholder="quantity">
            </div>
            <div>
                <label>Цена</label>
                <input name="price" type="text" placeholder="price">
            </div>
            <div>
                <label>Изображение</label>
                <input name="image" type="file" placeholder="image">
            </div>
            <div>
                <label>Дата</label>
                <input name="realese_date" type="date" placeholder="realese_date" value="<?php echo date('Y-m-d');?>">
            </div>
            <div>
                <label>Видимость</label>
                <select name="visibility" type="text" placeholder="visibility">
                    <option value="1">Видим</option>
                    <option value="1">Скрыт</option>
                </select>
            </div>
            <div>
                <label>Уровень ПК</label>
                <select name="tier" placeholder="tier">
                    <option value="1">Бюджетные</option>
                    <option value="2">Средние</option>
                    <option value="3">Игровые</option>
                    <option value="4">В столе</option>
                </select>
            </div>
            <div>
                <label>Железо</label>
                <div class="hardwares_admin">
                    <div>
                        <label>Процессор</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Видеокарта</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ОЗУ</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>МП</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>БП</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ССД</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ХДД</label>
                        <select name="hardware[]">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit">Создать ошубку</button>
    </form>
@endsection
