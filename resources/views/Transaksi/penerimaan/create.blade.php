<x-layout>
    <div class="p-4">
    <div class="bg-base-100 w-full rounded-lg shadow capitalize">
      <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
      <div class="w-full p-4">
        <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('users.store') }}" method="POST">
        @csrf
          <!-- Account Details -->
          <div class="w-full">
            <h6 class="text-lg font-semibold">Add transaksi penerimaan</h6>
            <hr class="mb-4 mt-2" />
          </div>
          
          @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


          <!-- First Name and Last Name -->
          <div class="w-full mt-3">
    <label class="form-control">
        <div class="label">
            <span class="label-text">jenis zakat</span>
        </div>
        <select 
            class="input" 
            required 
            name="judul">
            <option value="" disabled selected>Pilih jenis zakat</option>
            <option value="mr">maal</option>
            <option value="mrs">fitrah</option>
        </select>
        <span class="error-message">Silakan pilih jenis zakat</span>
        <span class="success-message">Looks good!</span>
    </label>
</div>

          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">nama muzakki</span>
              </div>
              <input type="text" placeholder="nama muzakki" class="input" required name="nik" />
              <span class="error-message">masukan nik anda dengan benar</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>

          <!-- Email and password -->
          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">total</span>
              </div>
              <input type="number" class="input" placeholder="total" aria-label="john@gmail.com" required name="username" />
              <span class="error-message">Please enter a valid email</span>
              <span class="success-message">Looks good!</span>
            </label>
          </div>

          <div class="w-full mt-3">
    <label class="form-control">
        <div class="label">
            <span class="label-text">Upload Gambar sebagai bukti</span>
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

<!-- Date Picker -->
<div class="w-full">
<label class="form-control">
        <div class="label">
            <span class="label-text">Tanggal penerimaan</span>
        </div>
        <input 
            type="date" 
            class="input" 
            required 
            name="tanggal_lahir" 
        />
        <span class="error-message">Masukkan tanggal lahir Anda dengan benar</span>
        <span class="success-message">Looks good!</span>
    </label>
</div>
<!-- Date Picker -->
<div class="w-full">
<label class="form-control">
        <div class="label">
            <span class="label-text">Tanggal input</span>
        </div>
        <input 
            type="date" 
            class="input" 
            required 
            name="tanggal_lahir" 
        />
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
        <input 
            type="date" 
            class="input" 
            required 
            name="tanggal_lahir" 
        />
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
            <button type="submit" name="" class="btn bg-biru text-white hover:bg-sky-800">Submit</button>
          </div>
        </form>
      </div>
    </div>
    </div>
</x-layout>