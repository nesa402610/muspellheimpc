@extends('admin.master')

@section('head-title')
    <title>Бренды</title>
@endsection

@section('content')
    <table>
        <thead>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{ route('brands.create') }}">
                <button type="submit">Добавить продукт</button>
                </form>
            </tr>
            @foreach ($brands as $brand)
                <tr>
                    <th>
                        {{ $brand->id }}
                    </th>
                    <th>{{ $brand->name }}</th>
                    <th>
                        <div>
                            <a href="{{ route('brands.create') }}">Создать</a>
                            <a href="{{ route('brands.edit', $brand->id) }}">Редактировать</a>
                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit">Удалить</button>
                            </form>
                        </div>
                    </th>
                    <th>

                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
