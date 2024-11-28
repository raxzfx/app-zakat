<x-layout>
    <div class="p-4">
    <div class="bg-base-100 w-full rounded-lg shadow capitalize">
      <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
      <div class="w-full p-4">
        <form class="needs-validation peer grid gap-y-4" novalidate action="{{ route('jenis-penerimaan.update', $jenisPenerimaan->kode_jenis) }}" method="POST">
        @csrf
        @method('PUT')
          <!-- Account Details -->
          <div class="w-full">
            <h6 class="text-lg font-semibold">edit Data jenis penerimaan</h6>
            <hr class="mb-4 mt-2" />
          </div>
          
          @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


          <div class="w-full">
            <label class="form-control">
              <div class="label">
                <span class="label-text">nama jenis</span>
              </div>
              <input type="text" placeholder="masukan nama lengkap" class="input" required name="deskripsi" value="{{ old('deskripsi', $jenisPenerimaan->deskripsi) }}" />
              <span class="error-message">masukan nama lengkap anda</span>
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