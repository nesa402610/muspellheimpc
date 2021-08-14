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
    @yield('add')
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
@endsection
