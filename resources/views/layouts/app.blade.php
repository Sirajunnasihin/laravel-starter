<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <!-- Icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <script defer src="{{ asset('theme') }}/assets/scripts/main.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/demo.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/toastr.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/scrollbar.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/fullcalendar.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/maps.js"></script>
    <script defer src="{{ asset('theme') }}/assets/scripts/chart_js.js"></script>
    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
</head>
<body>
@include('sweetalert::alert')
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('layouts.header')
    @include('layouts.setting')
    <div class="app-main">
        @include('layouts.navigation')
        <div class="app-main__outer">
            {{ $slot }}
            @include('layouts.footer')
        </div>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
</div>

@stack('modals')

@livewireScripts

@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

@if (session()->has('success'))
    <script>
        var notyf = new Notyf({dismissible: true})
        notyf.success('{{ session('success') }}')
    </script>
@endif

<script>
    /* Simple Alpine Image Viewer */
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', (src = '') => {
            return {
                imageUrl: src,

                refreshUrl() {
                    this.imageUrl = this.$el.getAttribute("image-url")
                },

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        })
    })
</script>
</body>
</html>
