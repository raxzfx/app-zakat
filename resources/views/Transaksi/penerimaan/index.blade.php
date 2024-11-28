<x-layout>
    <div class="p-4">
        <h1 class="uppercase text-xl">transaksi penerimaan</h1>

        <div class="flex items-center justify-between mt-4 ">
            <button type="button" class="bg-green-500 text-white py-1 px-3 rounded-md text-sm">
                <span class="mr-2">export data</span>
                <ion-icon name="download-outline"></ion-icon>
            </button>
            
            <div class="flex items-center">
                <button type="button" class="bg-biru text-white py-1 px-3 rounded-md text-sm mr-3">
                    <span class="mr-2">filter data</span>
                    <ion-icon name="filter-outline"></ion-icon>
                </button>
                <a href="{{ route('transaksi-penerimaan.create') }}" class="bg-biru text-white py-1 px-3 rounded-md text-sm">
                    <span class="mr-2">add data</span>
                    <ion-icon name="add-circle-outline"></ion-icon>
                </a>
            </div>

        </div>

        <div class="flex items-center justify-between mt-4 text-sm">

            <div class="flex items-center">
                <span>Show</span>
                <select id="entriesSelect" class="select w-15 h-5 rounded-full text-sm mx-2" aria-label="Pilled select">
                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                    <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15</option>
                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                </select>
                <span>entries</span>
            </div>


            <form action="{{ route('transaksi-penerimaan.index') }}" method="GET" class="relative mt-1 flex items-center">
    <label for="table-search" class="sr-only">Search</label>
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <ion-icon name="search-outline"></ion-icon>
    </div>
    <input 
        type="text" 
        id="table-search" 
        name="query" 
        class="block w-64 pl-10 p-2 border border-gray-200 rounded-l-md text-sm focus:ring-blue-500 focus:border-blue-500" 
        placeholder="Search anyone" 
        value="{{ request('query') }}"> <!-- Tetap tampilkan query -->
    <button 
        type="submit" 
        class="bg-blue-500 text-white py-2 px-3 rounded-r-md text-sm transition-all duration-150 ease-in-out hover:bg-blue-600">
        Submit
    </button>
</form>
        </div>


        <!-- table -->
        <div class="overflow-x-auto w-full mt-6 mb-1">
            <table class="w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            No</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            jenis zakat</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            nama muzakki</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            total</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            bukti</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            tgl penerimaan</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            tgl input</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            tgl trans</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transaksi as $index =>$pemberi)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">  {{ $transaksi->firstItem() + $index }} </td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->jenisZakat -> deskripsi}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->muzakki -> nama_lengkap}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->jumlah}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->bukti}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->tgl_penerimaan}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$pemberi->created_at -> format('d-m-Y')}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm ">
                        {{ strlen($pemberi->tgl_transaksi) > 7 ? substr($pemberi->tgl_transaksi, 0, 7) . '...' : $pemberi->tgl_transaksi }}
                        </td>   
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                            <!-- button edit -->
                            <a href="{{ route('penerimaan.edit', $pemberi->id) }}" class="bg-green-500 text-white py-1 px-3 rounded-md mb-1 ">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <!-- a delete -->
                            <form action="{{ route('penerimaan.destroy', $pemberi->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure you want to delete this user?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-md mb-1 ">
        <ion-icon name="trash-outline"></ion-icon>
    </button>
</form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $transaksi->links() }}
        <!-- end table -->
    </div>   
</x-layout>


   
