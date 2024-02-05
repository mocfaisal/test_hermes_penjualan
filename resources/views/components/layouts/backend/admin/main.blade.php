@include('components.layouts.backend.admin.resources')
@include('components.layouts.backend.admin.header')
@include('components.layouts.backend.admin.sidebar')

<div class='layout-navbar navbar-fixed' id="main">
   @include('components.layouts.backend.admin.navigation')
    <div id="main-content">

        {{ $slot }}

        @include('components.layouts.backend.admin.footer')

    </div>
</div>
</div>
<script src="{{ asset('assets/backend') }}/static/js/components/dark.js" data-navigate-once></script>
<script src="{{ asset('assets/backend') }}/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<script src="{{ asset('assets/backend') }}/compiled/js/app.js" data-navigate-once></script>

</body>

</html>
@yield('global.resources.footer')
@yield('global.javascript.footer')
@yield('private.js.file')
@yield('private.js.code')
@stack('scripts')
