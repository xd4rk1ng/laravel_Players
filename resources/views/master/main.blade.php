<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Players</title>

    {{-- STYLE SECTION --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
    @yield('styles')
    {{-- END STYLE SECTION --}}
</head>

<body>
{{-- Header --}}
@component('master.header')
@endcomponent
{{-- End Header --}}

{{-- Content --}}
<main>
    <div class="width-50">
        @yield('content')
    </div>
</main>
{{-- End Content --}}

{{-- Footer --}}
@component('master.footer')
@endcomponent
{{-- End Footer --}}

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@yield('scripts')
</body>
</html>
