<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>

   

 @vite('resources/css/app.css')

</head>
<body class="bg-rasya  font-semibold">

<style>
    .group .dropdown-toggle ion-icon {
    transition: transform 0.2s ease-in-out;
}

.group-[.selected] .dropdown-toggle ion-icon {
    transform: rotate(90deg);
}
</style>

<!-- sidebar -->
<div class="fixed left-0 top-0  w-56 h-full bg-biru p-4 shadow-md shadow-black/15">
     <div class="flex items-center pb-4 border-b border-slate-200">
        <img src="{{ asset('img/rpl.png') }}" alt="logo rpl" class="w-8 h-8">
        <span class="text-slate-200 text-xl ml-3">RPL</span>
     </div>
     <ul class="pt-6 text-black text-sm capitalize">
        <li class="mb-1 group active">
         <a href="" class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white  group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle">
            <ion-icon name="home-outline" class="mr-2"></ion-icon>
            <span>dashboard</span>
        </a>
        </li>

        <li class="mb-1 group">
        <a href="" class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle">
            <ion-icon name="folder-outline" class="mr-2"></ion-icon>
            <span>master data</span>
            <ion-icon name="chevron-forward-outline" class="ml-auto group-[.selected]:rotate-90"></ion-icon>
        </a>
         <!-- sub menu -->
        <ul class="capitalize pl-8 mt-2 text-black hidden group-[.selected]:block">
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    user
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    muzakki
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    mustahik
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    jenis penerimaan
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    jenis penyaluran
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    jenis pengeluaran
                </a>
            </li>
            </ul>
        </li>

        <li class="mb-1 group">
        <a href=""class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle ">
            <ion-icon name="cash-outline" class="mr-2"></ion-icon>  
            <span>transaksi</span>
            <ion-icon name="chevron-forward-outline" class="ml-auto group-[.selected]:rotate-90"></ion-icon>
        </a>
         <!-- sub menu -->
        <ul class="capitalize pl-8 mt-2 text-black hidden group-[.selected]:block">
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    penerimaan
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    penyaluran
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    pengeluaran
                </a>
            </li>
            </ul>
        </li>

        <li class="mb-1 group">
        <a href="" class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle">
            <ion-icon name="information-circle-outline" class="mr-2"></ion-icon>  
            <span>informasi</span>
            <ion-icon name="chevron-forward-outline" class="ml-auto group-[.selected]:rotate-90"></ion-icon>
        </a>
         <!-- sub menu -->
        <ul class="capitalize pl-8 mt-2 text-black hidden group-[.selected]:block">
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    kategori
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    informasi
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    FAQ
                </a>
            </li>
            </ul>
        </li>

        <li class="mb-1 group">
        <a href="" class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle">
            <ion-icon name="document-outline" class="mr-2"></ion-icon> 
            <span>laporan</span>  
            <ion-icon name="chevron-forward-outline" class="ml-auto group-[.selected]:rotate-90"></ion-icon>
            </a>
            <!-- sub menu -->
            <ul class="capitalize pl-8 mt-2 text-black hidden group-[.selected]:block ">
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    penerimaan
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    penyaluran
                </a>
            </li>
            <li class="mb-3 ">
                <a href="" class=" text-sm flex items-center hover:text-white before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-black before:mr-2">
                    pengeluaran
                </a>
            </li>
            </ul>
        </li>

        <li class="mb-1 group">
        <a href="" class="flex items-center py-2 px-4 hover:bg-toska rounded-md hover:text-white group-[.selected]:bg-toska group-[.selected]:text-gray-100 dropdown-toggle">
            <ion-icon name="settings-outline" class="mr-2"></ion-icon>
            <span>pengaturan</span>  
            </a>
        </li>
     </ul>
</div>
<!-- end sidebar -->

<!--main-->
<main class="w-[calc(100%-14rem)] ml-56 bg-rasya min-h-screen " > 
<div class="py-2 px-2 bg-toska flex items-center text-xl  shadow-md shadow-black/15">
<button type="button">
    <ion-icon name="menu-outline"></ion-icon>
</button>
<ul class="flex items-center ml-auto mr-7 text-xl">
    <li class="mr-2">
    <ion-icon name="notifications-outline"></ion-icon>
    </li>
    <li>
         <ion-icon name="person-circle-outline"></ion-icon>
    </li>
</ul>
</div>
</main>
<!-- end main-->

<script src="{{ asset('js/dropdownSubmenu.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>