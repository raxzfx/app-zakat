<x-layout>
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('transaksi-penerimaan.update', $transaksiPenerimaan->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">edit transaksi penerimaan</h6>
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
                                @foreach ($jenis_zakat as $jenis)
                                    <option value="{{ $jenis->kode_jenis }}"
                                        {{ $jenis->kode_jenis == $transaksiPenerimaan->jenis_zakat ? 'selected' : '' }}>
                                        {{ $jenis->deskripsi }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error-message">Silakan pilih jenis zakat</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full mt-3">
                      <label class="form-control">
                          <div class="label">
                              <span class="label-text">muzakki</span>
                          </div>
                          <select class="input" required name="id_muzaki">
                              <option value="" disabled selected>Pilih jenis muzakki</option>
                              @foreach ($muzakki as $pemberi)
                                  <option value="{{ $pemberi->id }}"
                                      {{ $pemberi->id == $transaksiPenerimaan->id_muzaki ? 'selected' : '' }}>
                                      {{ $pemberi->nama_lengkap }}
                                  </option>
                              @endforeach
                          </select>
                          <span class="error-message">Silakan pilih nama muzakki</span>
                          <span class="success-message">Looks good!</span>
                      </label>
                  </div>

                    <!-- Email and password -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">total</span>
                            </div>
                            <input type="number" class="input" value="{{ old('jumlah' , $transaksiPenerimaan->jumlah) }}" placeholder="total" aria-label="john@gmail.com"
                                required name="jumlah" />
                            <span class="error-message">Please enter a valid email</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full mt-3">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Upload Gambar sebagai bukti</span>
                            </div>
                            <input type="file" class="input file-input" accept="image/*" 
                                name="bukti" />
                            <span class="error-message">Silakan unggah gambar yang valid</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <!-- Date Picker -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Tanggal penerimaan</span>
                            </div>
                            <input type="date" class="input" required name="tgl_penerimaan" value="{{ old('tgl_penerimaan' , $transaksiPenerimaan->tgl_penerimaan) }}"/>
                            <span class="error-message">Masukkan tanggal lahir Anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>
                    <!-- Date Picker -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">Tanggal transaksi</span>
                            </div>
                            <input type="date" class="input" required name="tgl_transaksi" value="{{ old('tgl_transaksi' , $transaksiPenerimaan->tgl_transaksi) }}"/>
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
