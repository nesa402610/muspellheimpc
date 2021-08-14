@extends('admin.templates.edit')


    @section('add')
        <h2 style="margin-top: 10rem">Работает, можешь проверять</h2>
        <form action="{{ route('pcbuilders.update', $build->id) }}" method="POST" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            @csrf
            <div class="admin_create_pc">
                <div>
                    <label>Название</label>
                    <input name="name" value="{{ $build->product->name }}" type="text" placeholder="Название">
                </div>
                <div>
                    <label>Название</label>
                    <input name="shortname" value="{{ $build->product->shortname }}" type="text" placeholder="Короткое название">
                </div>
                <div>
                    <label>Описание</label>
                    <input name="description" value="{{ $build->product->description }}" type="text" placeholder="description">
                </div>
                <div>
                    <label>Количество</label>
                    <input name="quantity" value="{{ $build->product->quantity }}" type="text" placeholder="quantity">
                </div>
                <div>
                    <label>Цена</label>
                    <input name="price" value="{{ $build->product->price }}" type="text" placeholder="price">
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
                    <select name="visibility"  type="text" placeholder="visibility">
                        <option @if ($build->visibility === 1) selected @endif value="1">Видим</option>
                        <option @if ($build->visibility === 0) selected @endif value="0">Скрыт</option>
                    </select>
                </div>
                <div>
                    <label>Уровень ПК</label>
                    <select name="tier" placeholder="tier">
                        <option @if ($build->tier === 1) selected @endif value="1">Бюджетные</option>
                        <option @if ($build->visibility === 2) selected @endif value="2">Средние</option>
                        <option @if ($build->visibility === 3) selected @endif value="3">Игровые</option>
                        <option @if ($build->visibility === 4) selected @endif value="4">В столе</option>
                    </select>
                </div>
                <div>
                    <label>Железо</label>
                    <div class="hardwares_admin">
                        <div>
                            <label>Процессор</label>
                            <select name="hardware_CPU_id">
                                <option value=" ">Нет</option>

                                @foreach ($hardwares->where('category_id', 2) as $hardware)
                                    <option @if ($hardware->product->id === $build->CPU_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Видеокарта</label>
                            <select name="hardware_GPU1_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 3) as $hardware)
                                    <option @if ($hardware->product->id === $build->GPU1_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Видеокарта 2 (если есть)</label>
                            <select name="hardware_GPU2_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 3) as $hardware)
                                    <option @if ($hardware->product->id === $build->GPU2_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ОЗУ</label>
                            <select name="hardware_RAM_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 4) as $hardware)
                                    <option @if ($hardware->product->id === $build->RAM_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>МП</label>
                            <select name="hardware_motherboard_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 8) as $hardware)
                                    <option @if ($hardware->product->id === $build->MotherBoard_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>БП</label>
                            <select name="hardware_SPU_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 5) as $hardware)
                                    <option @if ($hardware->product->id === $build->SPU_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ССД</label>
                            <select name="hardware_SSD1_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 6) as $hardware)
                                    <option @if ($hardware->product->id === $build->SSD1_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ССД2 ( если есть)</label>
                            <select name="hardware_SSD2_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 6) as $hardware)
                                    <option @if ($hardware->product->id === $build->SSD2_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ССД3 ( если есть)</label>
                            <select name="hardware_SSD3_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 6) as $hardware)
                                    <option @if ($hardware->product->id === $build->SSD3_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ССД4 ( если есть)</label>
                            <select name="hardware_SSD4_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 6) as $hardware)
                                    <option @if ($hardware->product->id === $build->SSD4_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ХДД1</label>
                            <select name="hardware_HDD1_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 7) as $hardware)
                                    <option @if ($hardware->product->id === $build->HDD1_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ХДД2</label>
                            <select name="hardware_HDD2_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 7) as $hardware)
                                    <option @if ($hardware->product->id === $build->HDD2_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ХДД3</label>
                            <select name="hardware_HDD3_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 7) as $hardware)
                                    <option @if ($hardware->product->id === $build->HDD3_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>ХДД4</label>
                            <select name="hardware_HDD4_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares->where('category_id', 7) as $hardware)
                                    <option @if ($hardware->product->id === $build->HDD4_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Охлажение CPU</label>
                            <select name="hardware_CPU_cooler_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares as $hardware)
                                    <option @if ($hardware->product->id === $build->CPU_cooler_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Платы расширения PCI1</label>
                            <select name="hardware_PCI1_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares as $hardware)
                                    <option @if ($hardware->product->id === $build->PCI1_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Платы расширения PCI2</label>
                            <select name="hardware_PCI2_id">
                                <option value=" ">Нет</option>
                                @foreach ($hardwares as $hardware)
                                    <option @if ($hardware->product->id === $build->PCI2_id) selected @endif value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Платы расширения PCI3</label>
                            <select name="hardware_PCI3_id">
                                <option @if ($hardware->product->id === $build->PCI3_id) selected @endif value=" ">Нет</option>
                                @foreach ($hardwares as $hardware)
                                    <option value="{{ $hardware->product->id }}">{{ $hardware->product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Какая ОС</label>
                            <input value="{{ $build->OS_name }}" type="text" name="hardware_OS_name">
                        </div>
                        <div>
                            <label>Корпус</label>
                            <input value="{{ $build->case }}" type="text" name="hardware_case">
                        </div>
                        <div>
                            <label>Размеры</label>
                            <div class="Vflex">
                                <input value="{{ $build->height }}" type="text" name="hardware_height" placeholder="Высота">
                                <input value="{{ $build->width }}" type="text" name="hardware_width" placeholder="Ширина">
                                <input value="{{ $build->legth }}" type="text" name="hardware_lenght" placeholder="Глубина">
                            </div>
                        </div>
                        <div>
                            <label>Вес компа</label>
                            <input value="{{ $build->weight }}" type="text" name="hardware_weight">
                        </div>
                    </div>
                </div>

            </div>
            <button type="submit">Обновить билд</button>
        </form>
    @endsection
