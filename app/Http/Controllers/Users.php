<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query'); // Ambil input pencarian
        $perPage = $request->get('per_page', 10); // Default 10 item per halaman
    
        // Jika ada parameter pencarian, gunakan kondisi where
        if ($query) {
            $users = User::where('name', 'like', '%' . $query . '%')
                         ->paginate($perPage);
        } else {
            // Jika tidak ada pencarian, tampilkan semua data
            $users = User::paginate($perPage);
        }
    
        return view('DataMaster.users.index', compact('users'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('DataMaster.users.formAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

{
    
    if (User::where('username', $request->username)->exists()) {
        return redirect()->back()->with('error', 'Username sudah ada, gunakan yang lain');
    }

    

    $request->validate([
        'nik' => 'required|numeric|unique:users,nik',
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'min:8',
        ]);
    

    User::create([
        'nik' => $request->nik,
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make('12345678') ,
    ]);
    
    return redirect()->route('users.index')->with('success', 'User created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
/******  c7fb6db1-16e9-4936-920a-0b6adfb74853  *******/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('DataMaster.users.formEdit', compact('user'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        // Cari user yang akan diupdate berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input akan dilakukan melalui UserRequest

        // Update hanya kolom yang diisi oleh user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        // Jika ada input password, hash dan simpan
        if ($request->filled('password')) {
            // Pastikan password yang baru cukup aman
            $user->password = Hash::make($request->password);
        }

        // Update data lainnya jika diperlukan, contoh:
        $user->nik = $request->nik;

        // Simpan perubahan ke database
        $user->save();

        // Redirect kembali ke daftar user dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function export(){

        return Excel::download(new UserExport, 'users.xlsx');

    }
}


