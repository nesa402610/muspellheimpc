<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    @include('includes.head')
    @yield('head-title')
</head>

<body>

    <style>
        .bg-dim {
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
            position: absolute;
            background: hsl(0deg 0% 7% / 70%);
            left: 0;
            top: 0;
        }

        .admin_modular>.bg-dim>div {
            display: flex;
            flex-direction: column;
            font-size: 1.2rem;
            color: black;
            padding: 0.5rem 0rem;
            align-items: center;
            position: absolute;
            margin-top: 8rem;
            width: 40%;
            background: hsl(30deg 90% 60%);
            box-shadow: 0 0 20px 0 hsl(0deg 0% 0% / 30%);
            z-index: 11;
        }

        .CANCEL {
            padding: 0.5rem;
            background: #545454;
            color: white;
        }

        .admin_modular .bg-dim>div form button {
            background: hsl(0deg 100% 50%);
        }

        .admin_modular .bg-dim button {
            width: 15rem;
        }

    </style>
    <div id="page">
        @include('admin.includes.header')
        <main>
            <div id="size-cutter">
                <div class="admin_modular" style="display: none">
                    <div class="bg-dim">
                        <div class="admin confirm-action">
                            <h3>Точно удалить?</h3>
                            <div style="display: flex; gap: 2rem;">
                                <form style="display: flex" action="" method="POST">
                                    @csrf
                                    <button type="submit" class="delete-btn">Удалить</button>
                                    {{ method_field('delete') }}
                                </form>
                                <button class="CANCEL">
                                    ОТМЕНИТЬ УДАЛЕНИЕ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @if (session()->has('success'))
                    <p>{{ session()->get('success') }}</p>
                @elseif (session()->has('accesserr'))
                    <h2>{{ session()->get('AccessErr') }}</h2>
                @endif
                @yield('content')
                @yield('preview')
            </div>
        </main>
        @include('includes.footer')
    </div>
</body>
<script>
    $('.admin_modular .CANCEL').click(function (e) {
        e.preventDefault();
        $('.admin_modular').css('display', 'none');
        $('.admin_modular .admin.confirm-action form').attr('action', "");
    });

</script>

</html>
