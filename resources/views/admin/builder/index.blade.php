@extends('admin.master')

@section('head-title')
    <title>Категории</title>
@endsection

@section('content')
    <div id="pc_builds">
        <div class="build">
            <div>
                <div class="build_header">
                    Создать новый
                </div>
                <div class="build_content">
                </div>
                <div class="build_footer">
                    <a href="{{ route('pcbuilders.create') }}" class="create_build">Создать</a>
                </div>
            </div>

        </div>
        @foreach ($pc_builds as $pc_build)
            <div class="build">
                <div>
                    <div class="build_header">
                        <a href="{{ route('pcbuilders.show', $pc_build->id) }}">{{ $pc_build->product->name }}</a>
                    </div>
                    <div class="build_content">
                        <div class="hardware">
                            {{-- {{ dd($build->hardwares()->get()->take(6)) }} --}}
                            @foreach ($pc_build->hardwares as $hardware)
                                <div>
                                    <a
                                        href="{{ route('hardwares.show', $hardware->id) }}">{{ $hardware->product->name }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="build_footer">
                        <div class="price">
                            {{ $pc_build->product->price }} рублей
                        </div>
                        <div class="btns">
                            @if ($pc_build->product->visibility == 1)
                                <form action="{{ route('pcbuilders.hide', $pc_build->id) }}" method="post">
                                    @CSRF
                                    <button type="submit" class="button hide-btn" name="button">Скрыть</button>
                                </form>
                            @else
                                <form action="{{ route('pcbuilders.restore', $pc_build->id) }}" method="post">
                                    @CSRF
                                    <button type="submit" class="button restore-btn" name="button"
                                        style="background-color: hsl(45deg 90% 60%);">Восстановить</button>
                                </form>
                            @endif
                            <a href="{{ route('pcbuilders.edit', $pc_build->id) }}">
                                <button type="submit" class="button hide-btn" name="button">edit</button>
                            </a>
                            <form action="{{ route('pcbuilders.destroy', $pc_build->id) }}" method="post">
                                @CSRF
                                <button type="submit" class="button delete-btn" name="button"
                                    style="    background-color: hsl(10deg 90% 60%);">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('paginator')
@endsection
