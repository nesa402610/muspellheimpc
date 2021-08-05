@extends('admin.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="@yield('route_name')" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <thead>
                @yield('thead')
            </thead>

            <tbody>
                @yield('tbody')
            </tbody>
        </table>
        <button type="submit">Создать</button>
    </form>
@endsection
