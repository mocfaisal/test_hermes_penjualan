@include('components.layouts.frontend.portal.header')
@include('components.layouts.frontend.portal.navigation')
@include('components.layouts.frontend.portal.resources')

{{ $slot }}

@include('components.layouts.frontend.portal.footer')

</body>
</html>
@yield('javascript.code.global')
@stack('scripts')
