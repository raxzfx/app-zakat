<x-layout>
    
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('muzakki.store') }}"
                    method="POST">
                    @csrf
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">Add Data informasi</h6>
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
                                <span class="label-text">judul</span>
                            </div>
                            <input type="text" placeholder="masukan judul" class="input" required
                                name="nik" />
                            <span class="error-message">masukan nama lengkap anda</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full mt-4">
   

                   <!-- Textarea for Konten Text -->
<div class="w-full">
    <label class="form-control">
        <div class="label">
            <span class="label-text">Konten Text</span>
        </div>
        <textarea 
            class="input h-24" 
            placeholder="Masukkan text untuk konten" 
            aria-label="alamat" 
            required 
            name="alamat">
        </textarea>
        <span class="error-message">Masukkan alamat Anda dengan benar</span>
        <span class="success-message">Looks good!</span>
    </label>
</div>

<div class="w-full mt-3">
    <label class="form-control">
        <div class="label">
            <span class="label-text">kategori</span>
        </div>
        <select 
            class="input" 
            required 
            name="judul">
            <option value="" disabled selected>Pilih kategori</option>
            <option value="mr">Tuan</option>
            <option value="mrs">Nyonya</option>
            <option value="ms">Nona</option>
            <option value="dr">Dokter</option>
        </select>
        <span class="error-message">Silakan pilih judul</span>
        <span class="success-message">Looks good!</span>
    </label>
</div>
          
<div class="w-full mt-3">
    <label class="form-control">
        <div class="label">
            <span class="label-text">Upload Gambar</span>
        </div>
        <input 
            type="file" 
            class="input file-input" 
            accept="image/*" 
            required 
            name="upload_gambar"
        />
        <span class="error-message">Silakan unggah gambar yang valid</span>
        <span class="success-message">Looks good!</span>
    </label>
</div>

<div class="w-full mt-3">
    <label class="form-control">
        <div class="label">
            <span class="label-text">status</span>
        </div>
        <select 
            class="input" 
            required 
            name="judul">
            <option value="" disabled selected>Pilih status</option>
            <option value="mr">Tuan</option>
            <option value="mrs">Nyonya</option>
            <option value="ms">Nona</option>
            <option value="dr">Dokter</option>
        </select>
        <span class="error-message">Silakan pilih judul</span>
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
