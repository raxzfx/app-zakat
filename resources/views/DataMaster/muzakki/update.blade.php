<x-layout>
    <div class="p-4">
        <div class="bg-base-100 w-full rounded-lg shadow capitalize">
            <!-- <h5 class="bg-base-300 rounded-t-lg p-4 text-base font-bold">JS Validation</h5> -->
            <div class="w-full p-4">
                <form class="needs-validation peer grid gap-y-4" novalidate
                    action="{{ route('muzakki.update', $muzakki->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Account Details -->
                    <div class="w-full">
                        <h6 class="text-lg font-semibold">edit Data muzakki</h6>
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
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">NIK</span>
                            </div>
                            <input type="text" placeholder="masukan nik " class="input" required name="nik"
                                value="{{ old('nik', $muzakki->nik) }}" />
                            <span class="error-message">masukan nama lengkap anda</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">nama lengkap</span>
                            </div>
                            <input type="text" placeholder="nama lengkap" class="input" required name="nama_lengkap"
                                value="{{ old('nama_lengkap', $muzakki->nama_lengkap) }}" />
                            <span class="error-message">masukan nama lengkap anda dengan benar</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <!-- Email and password -->
                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">alamat</span>
                            </div>
                            <input type="text" class="input" placeholder="alamat" aria-label="john@gmail.com"
                                required name="alamat" value="{{ old('alamat', $muzakki->alamat) }}" />
                            <span class="error-message">Please enter a valid email</span>
                            <span class="success-message">Looks good!</span>
                        </label>
                    </div>

                    <div class="w-full">
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text">no telp</span>
                            </div>
                            <div class="input-group">
                                <input id="no_telp" type="text" class="input" placeholder="no telp" name="no_telp"
                                    value="{{ old('no_telp', $muzakki->no_telp) }}" />
                            </div>
                            <span class="error-message">Please enter a valid password</span>
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
