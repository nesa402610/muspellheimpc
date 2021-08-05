<!DOCTYPE html>
<html lang="ru" dir="ltr">

<head>
    @include('includes.head')
    @yield('head-title')
</head>

<body>
    <div id="page">
        @include('admin.includes.header')
        <main>
            <div id="size-cutter">
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

</html>
