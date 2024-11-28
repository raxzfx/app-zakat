<x-layout>
    
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('informasi-kategori.store') }}"
                    method="POST">
                    @csrf
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">pengaturan</h6>
                        <hr class="mb-4 mt-2" />
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    <!-- First Name and Last Name -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">nama mesjid</span>
                            </div>
                            <input type="text" placeholder="input nama masjid" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan nama masjid</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                        <!-- Date Picker -->
                        <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Tanggal dibuat</span>
                            </div>
                            <input type="date" class="input" required name="tgl_transaksi" />
                            <span class="error-message">Masukkan tanggal dibuatnya</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">alamat</span>
                            </div>
                            <input type="text" placeholder="input alamat" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan alamat dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">koordinat</span>
                            </div>
                            <input type="text" placeholder="input koordinat" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan koordinat dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">no.telp mesjid</span>
                            </div>
                            <input type="number" placeholder="input no telepon masjid" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan no telpon masjid</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">nama pimpinan</span>
                            </div>
                            <input type="text" placeholder="input nama pimpinan" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan nama pimpinan masjid dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">no hp</span>
                            </div>
                            <input type="number" placeholder="input no hp" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan no hp dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">email</span>
                            </div>
                            <input type="email" placeholder="input email" class="input" required
                                name="nama_kategori" />
                            <span class="error-message">masukan email dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>
                  
   


                    <!-- Terms and Conditions -->
                    <div class="w-full mt-5">
                        <label class="flex items-center gap-3">
                            <input type="checkbox" class="checkbox checkbox-primary" id="check1" required />
                            <span class="label cursor-pointer flex-col items-start">
                                <span class="label-text text-base"></span>
                            </span>
                        </label>
                        <span class="error-message">Please confirm our T&C</span>
                        <span class="success-message">Looks good!</span>
                    </div>

                    <!-- Submit button -->
                    <div class="mt-6">
                        <button type="submit" name=""
                            class="btn bg-biru text-white hover:bg-sky-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
