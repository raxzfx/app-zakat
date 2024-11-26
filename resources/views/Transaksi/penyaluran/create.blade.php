<x-layout>
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('transaksi-penyaluran.store') }}"
                    method="POST">
                    @csrf
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">Add transaksi penyaluran</h6>
                        <hr class="mb-4 mt-2" />
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- First Name and Last Name -->
                    <div class="w-full mt-3">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">jenis zakat</span>
                            </div>
                            <select class="input" required name="jenis_zakat">
                                <option value="" disabled selected>Pilih jenis zakat</option>
                                  @foreach ($jenis_zakat as $jenis )
                                    <option value="{{ $jenis->kode_jenis }}">{{ $jenis->deskripsi }}</option>
                                  @endforeach
                            </select>
                            <span class="error-message">Silakan pilih jenis zakat</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full mt-3">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Nama penerima</span>
                            </div>
                            <select class="input" required name="nama_penerima">
                                <option value="" disabled selected>Pilih jenis zakat</option>
                                  @foreach ($mustahiq as $penerima )
                                    <option value="{{ $penerima->id }}">{{ $penerima->nama_jenis }}</option>
                                  @endforeach
                            </select>
                            <span class="error-message">Silakan pilih jenis zakat</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <!-- Email and password -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">jumlah</span>
                            </div>
                            <input type="number" class="input" placeholder="total" aria-label="john@gmail.com"
                                required name="jumlah" />
                            <span class="error-message">Please enter a valid email</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">alamat penerima</span>
                            </div>
                            <input type="text" placeholder="nama muzakki" class="input" required name="alamat_penerima" />
                            <span class="error-message">masukan nik anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>


                    <!-- Date Picker -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Tanggal penyaluran</span>
                            </div>
                            <input type="date" class="input" required name="tgl_transaksi" />
                            <span class="error-message">Masukkan tanggal lahir Anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>



                    <!-- Terms and Conditions -->
                    <div class="w-full">
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
