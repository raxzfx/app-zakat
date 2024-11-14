<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-sidebar></x-sidebar>
<main class="w-[calc(100%-14rem)] ml-56 bg-slate-100 min-h-screen">
<x-navbar></x-navbar>
{{ $slot }}
</main>
<script src="{{ asset('js/dropdownSubmenu.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="{{asset('js/sortingData.js')}}"></script>
</body>
</html>