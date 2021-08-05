@extends('admin.master')

@section('head-title')
    <title>Категории</title>
@endsection

@section('content')
    <table>
        <thead>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>Количетсво объектов</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="{{ route('categories.create') }}">
                <button type="submit">Добавить продукт</button>
                </form>
            </tr>
            @foreach ($category as $cat)
                <tr>
                    <th>
                        {{ $cat->id }}
                    </th>
                    <th>
                        {{ $cat->name }}
                    </th>
                    <th>{{ $cat->totalQuantity() }}</th>
                    <th>
                        <div>
                            <a href="{{ route('categories.create') }}">Создать</a>
                            <a href="{{ route('categories.edit', $cat->id) }}">Редактировать</a>
                            <form action="{{ route('categories.destroy', $cat->id) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button type="submit">Удалить</button>
                            </form>
                        </div>
                    </th>
                    <th></th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
