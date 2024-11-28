<x-layout>
 <div class="p-4">
        <h1 class="uppercase text-xl">kategori</h1>

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
        <a href="{{ route('informasi-kategori.create') }}" class="bg-biru text-white py-1 px-3 rounded-md text-sm">
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
       

<form action="{{ route('informasi-kategori.index') }}" method="GET" class="relative mt-1 flex items-center">
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
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">kategoti</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">tanggal dibuat</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index =>$kate)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">  {{ $categories->firstItem() + $index }} </td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$kate->nama_kategori}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">{{$kate->created_at->format('Y-m-d')}}</td>
                        <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                            <!-- button edit -->
                            <a href="{{ route('informasi-kategori.edit', $kate->id) }}" class="bg-green-500 text-white py-1 px-3 rounded-md mb-1 ">
                                <ion-icon name="create-outline"></ion-icon>
                            </a>
                            <!-- a delete -->
                            <form action="{{ route('informasi-kategori.destroy', $kate->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Are you sure you want to delete this user?');">
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
        {{ $categories->links() }}
        <!-- end table -->
    </div>   
</x-layout>
