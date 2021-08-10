<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    @include('includes.head')
    @yield('head')
</head>

<body>
    <div id="page">
        @include('includes.header')
        <main>
            {{-- <div id="modular">
                <div>
                    <p>Test</p>
                </div>
            </div> --}}
            @include('includes.session-alerts')
            @yield('content')
            @yield('aside')
        </main>
        @include('includes.footer')
    </div>
</body>

</html>
