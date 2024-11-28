
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Beranda</title>
</head>
<body class="font-sans antialiased">
    <nav class="w-full ">
        <div class="flex justify-center items-center w-4/5 rounded-b-xl mx-auto text-white space-x-10 py-7 bg-blue-500">
            <a href="{{ route('login') }}" class="text-xl  font-bold hover:text-blue-800">login</a>
            <img src="{{ asset('img/rpl.png') }}" alt="logo" class="w-8 h-8">
            <a href="{{ route('register') }} " class="text-xl font-bold hover:text-blue-800">register</a>
        </div>
    </nav>
    <main>
        <div class="my-20 text-center">
            <h1 class="text-4xl">Selamat datang di website zakat</h1>
            <p>note:masih dalam tahap pengembangan</p>
        </div>
    </main>

    <script src="{{ asset('js/dropdownSubmenu.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="{{asset('js/sortingData.js')}}"></script>
<script src="{{asset('js/formValidate.js')}}"></script>
</body>
</html>