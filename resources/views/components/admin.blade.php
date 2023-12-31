@props(['selected'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name=“csrf-token” content=“{{ csrf_token() }}“>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        {{env('APP_NAME')}}
    </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script defer src="{{asset('js/app.js')}}"></script>
</head>
<body
        x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
        x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
        :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
<!-- ===== Preloader Start ===== -->
{{--<include src="./partials/preloader.html"></include>--}}
<x-partials.preloader />
<!-- ===== Preloader End ===== -->
@if(session('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="absolute bg-meta-3 bottom-0 p-2.5 right-4 z-999">
        {{session('message')}}
    </div>
@endif
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    {{--<include src="./partials/sidebar.html"></include>--}}
    <x-partials.sidebar  :selected="$selected"/>
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">

        <x-flash-message/>


        <!-- ===== Header Start ===== -->
        {{--<include src="./partials/header.html" />--}}
        <x-partials.header />
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                {{ $slot }}
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->
</body>

</html>