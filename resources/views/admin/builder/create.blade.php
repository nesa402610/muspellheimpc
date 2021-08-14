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
    <h2 style="margin-top: 10rem">Работает, можешь проверять</h2>
    <form action="{{ route('pcbuilders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="admin_create_pc">
            <div>
                <label>Название</label>
                <input name="name" type="text" placeholder="Название">
            </div>
            <div>
                <label>Название</label>
                <input name="shortname" type="text" placeholder="Короткое имя">
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
                    <option value="0">Скрыт</option>
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
                        <select name="hardware_CPU_id">
                            <option value="0">Нет</option>

                            @foreach ($hardwares->where('category_id', 2) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Видеокарта</label>
                        <select name="hardware_GPU1_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 3) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Видеокарта 2 (если есть)</label>
                        <select name="hardware_GPU2_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 3) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ОЗУ</label>
                        <select name="hardware_RAM_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 4) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>МП</label>
                        <select name="hardware_motherboard_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 8) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>БП</label>
                        <select name="hardware_SPU_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 5) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ССД</label>
                        <select name="hardware_SSD1_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 6) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ССД2 ( если есть)</label>
                        <select name="hardware_SSD2_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 6) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ССД3 ( если есть)</label>
                        <select name="hardware_SSD3_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 6) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ССД4 ( если есть)</label>
                        <select name="hardware_SSD4_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 6) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ХДД1</label>
                        <select name="hardware_HDD2_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 7) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ХДД2</label>
                        <select name="hardware_HDD3_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 7) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ХДД3</label>
                        <select name="hardware_HDD3_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 7) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>ХДД4</label>
                        <select name="hardware_HDD4_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares->where('category_id', 7) as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Охлажение CPU</label>
                        <select name="hardware_CPU_cooler_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Платы расширения PCI1</label>
                        <select name="hardware_PCI1_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Платы расширения PCI2</label>
                        <select name="hardware_PCI2_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Платы расширения PCI3</label>
                        <select name="hardware_PCI3_id">
                            <option value="0">Нет</option>
                            @foreach ($hardwares as $hardware)
                                <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label>Какая ОС</label>
                        <input type="text" name="hardware_OS_name">
                    </div>
                    <div>
                        <label>Корпус</label>
                        <input type="text" name="hardware_case">
                    </div>
                    <div>
                        <label>Размеры</label>
                        <div class="Vflex">
                            <input type="text" name="hardware_height" placeholder="Высота">
                            <input type="text" name="hardware_width" placeholder="Ширина">
                            <input type="text" name="hardware_lenght" placeholder="Глубина">
                        </div>
                    </div>
                    <div>
                        <label>Вес компа</label>
                        <input type="text" name="hardware_weight">
                    </div>
                </div>
            </div>

        </div>
        <button type="submit">Создать ошубку</button>
    </form>
@endsection
