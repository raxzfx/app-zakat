<x-layout>
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate
                    action="{{ route('transaksi-pengeluaran.store') }}" method="POST">
                    @csrf
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">Add Data transaksi pengeluaran</h6>
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


                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">nama pengeluaran</span>
                            </div>
                            <input type="text" placeholder="nama_pengeluaran" class="input" required name="nama_pengeluaran" />
                            <span class="error-message">masukan nama_pengeluaran anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                      <label class="form-control">
                          <div class="label">
                              <span class="label-text">alamat penerima</span>
                          </div>
                          <input type="text" placeholder="alamat_penerima" class="input" required name="alamat_penerima" />
                          <span class="error-message">masukan alamat_perima anda dengan benar</span>
                          <span class="success-message">Looks good!</span>
                      </label>
                  </div>

                    <!-- First Name and Last Name -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text"> jenis zakat</span>
                            </div>
                            <select name="jenis_zakat" id="jenis_zakat" class="input" required>
                              <option disabled selected>Pilih jenis zakat</option>
                              @foreach ($jenisPengeluaran as $jenis)
                                  <option value="{{ $jenis->kode_jenis }}">{{ $jenis->jenis_pengeluaran }}</option>
                              @endforeach
                          </select>
                            <span class="error-message">kode jenis</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">jumlah</span>
                            </div>
                            <input type="number" placeholder="jumlah" class="input" required name="jumlah" />
                            <span class="error-message">masukan jumlah anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <!-- Email and password -->
                    <div class="w-full">
                      <label class="form-control">
                          <div class="label">
                              <span class="label-text">Tanggal transaksi</span>
                          </div>
                          <input type="date" class="input" required name="tgl_transaksi" />
                          <span class="error-message">Masukkan tgl_transaksi Anda dengan benar</span>
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
