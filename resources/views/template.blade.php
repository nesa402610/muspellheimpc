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
            @if (session()->has('success'))
            <div id="modular">
                <div>
                    <p>{{ session()->get('success') }}</p>
                </div>
            </div>
            @elseif (session()->has('accesserr'))
                <div id="modular">
                    <div>
                        <p>{{ session()->get('AccessErr') }}</p>
                    </div>
                </div>
            @endif
            @yield('content')
            @yield('aside')
        </main>
        @include('includes.footer')
    </div>
</body>

</html>
