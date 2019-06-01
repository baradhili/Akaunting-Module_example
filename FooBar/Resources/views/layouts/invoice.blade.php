<html lang="{{ app()->getLocale() }}">
    @include('foobar::partials.invoice.head')

    <body onload="window.print();">
        @stack('body_start')

        @yield('content')

        @stack('body_end')
    </body>
</html>
