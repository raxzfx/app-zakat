<x-layout>
    <div class="p-4">
        <h1 class="uppercase text-xl">laporan pengeluaran</h1>

        <div class="flex items-center justify-between mt-4">
            <form method="GET" action="{{ route('data.export') }}" class="flex items-center">
                <button type="submit" class="bg-green-500 text-white py-1 px-3 rounded-md text-sm">
                    <span class="mr-2">Export Data</span>
                    <ion-icon name="download-outline"></ion-icon>
                </button>
            </form>
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

            <form method="GET" action="{{ request()->url() }}" class="flex items-center">
                <span class="mr-2">Jenis Zakat:</span>
                <select name="jenis_zakat" class="select w-15 h-5 rounded-full text-sm mx-2" aria-label="Filter jenis zakat" onchange="this.form.submit()">
                    <option value="">Semua</option>
                    @foreach ($jenisZakat as $zakat)
                        <option value="{{ $zakat->kode_jenis }}" {{ request('jenis_zakat') == $zakat->kode_jenis ? 'selected' : '' }}>
                            {{ $zakat->jenis_pengeluaran }}
                        </option>
                    @endforeach
                </select>
            </form>


            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
                <input type="text" id="table-search"
                    class="block w-64 pl-10 p-2 border border-gray-200 rounded-md text-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for items">
            </div>
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
                            tanggal pengeluaran</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            jenis</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            jumlah pengeluaran</th>

                    </tr>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider"
                            colspan="2">total:</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                                {{ request('jenis_zakat') ? $jenisZakat->firstWhere('kode_jenis', request('jenis_zakat'))->jenis_pengeluaran : 'Semua' }}
                            </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            {{ $total_pengeluaran }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksiPengeluaran as $index => $laporan)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                                {{ $transaksiPengeluaran->firstItem() + $index }} </td>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                                {{ $laporan->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                                {{ $laporan->jenisPengeluaran?->jenis_pengeluaran ?? 'Data tidak tersedia' }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 bg-white text-sm">
                                {{ $laporan->jumlah }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider"
                            colspan="2">total:</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                                {{ request('jenis_zakat') ? $jenisZakat->firstWhere('kode_jenis', request('jenis_zakat'))->jenis_pengeluaran : 'Semua' }}
                            </th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            {{ $total_pengeluaran }}</th>
                    </tr>
                    <tr>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            No</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            tanggal pengeluaran</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            jenis</th>
                        <th
                            class="px-6 py-3 border-b-2 border-gray-300 bg-gray-100 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">
                            jumlah pengeluaran</th>

                    </tr>
                </tbody>
            </table>
        </div>
        {{ $transaksiPengeluaran->links() }}
        <!-- end table -->
    </div>
</x-layout>
