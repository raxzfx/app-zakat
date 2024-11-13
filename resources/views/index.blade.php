<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class=" font-semibold">

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
<main class="w-[calc(100%-14rem)] ml-56 bg-slate-100 min-h-screen">
    <div class="py-2 px-2 bg-toska flex items-center text-xl shadow-md shadow-black/15">
        <ul class="flex items-center ml-auto mr-7">
            <li class="mr-2">
                <button type="button"><ion-icon name="notifications-outline"></ion-icon></button>
            </li>
            <li>
                <button type="button"><ion-icon name="person-circle-outline"></ion-icon></button>
            </li>
        </ul>
    </div>

    <!-- content -->
    <div class="p-4">
        <h1 class="uppercase text-xl">master data user</h1>

        <div class="flex items-center justify-between mt-4 ">
        <button type="button" class="bg-green-500 text-white py-1 px-3 rounded-md text-sm">
                                <span class="mr-2">export data</span>
                                <ion-icon name="download-outline"></ion-icon>
                            </button>

        <div>
        <button type="button" class="bg-biru text-white py-1 px-3 rounded-md text-sm">
                                <span class="mr-2">filter data</span>
                                <ion-icon name="filter-outline"></ion-icon>
                            </button>
        <button type="button" class="bg-biru text-white py-1 px-3 rounded-md text-sm">
                                <span class="mr-2">add data</span>
                                <ion-icon name="add-circle-outline"></ion-icon>
                            </button>
        </div>
        </div>

        <div class="flex items-center justify-between mt-4 text-sm">

        <div class="flex items-center">
             <span>show</span>
        <select class="select w-15 h-5 rounded-full text-sm mx-2" aria-label="Pilled select">
        <option>10</option>
        <option>15</option>
        <option>25</option>
        </select>
            <span>entries</span>
        </div>
       

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
                <input type="text" id="table-search" class="block w-64 pl-10 p-2 border border-gray-200 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Search for items">
            </div>
        </div>


        <!-- table -->
        <div class="overflow-x-auto w-full mt-6">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">nik</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">nama lengkap</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">username</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">password</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">1</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">69696969</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">roni pantek</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rongrong</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rong1234</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                            <!-- button edit -->
                            <button type="button" class="bg-green-500 text-white py-1 px-3 rounded-md ">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <!-- button delete -->
                            <button type="button" class="bg-red-600 text-white py-1 px-3 rounded-md ">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">2</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">69696969</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">roni pantek</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rongrong</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rong1234</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                            <!-- button edit -->
                            <button type="button" class="bg-green-500 text-white py-1 px-3 rounded-md hover:bg-toska-600">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <!-- button delete -->
                            <button type="button" class="bg-red-600 text-white py-1 px-3 rounded-md hover:bg-toska-600">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">3</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">69696969</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">roni pantek</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rongrong</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">rong1234</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                            <!-- button edit -->
                            <button type="button" class="bg-green-500 text-white py-1 px-3 rounded-md hover:bg-toska-600">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <!-- button delete -->
                            <button type="button" class="bg-red-600 text-white py-1 px-3 rounded-md hover:bg-toska-600">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end table -->
    </div>
</main>

<!-- end main-->

<script src="{{ asset('js/dropdownSubmenu.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>