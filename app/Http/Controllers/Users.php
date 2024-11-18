<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            // Menggunakan Eloquent dengan pagination
            $perPage = $request->get('per_page', 10); // Default ke 15 jika tidak ada parameter
            $users = User::paginate($perPage); // 15 adalah jumlah item per halaman
        
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
    if ($request->password != $request->password_confirmation) {
        return redirect()->back()->with('error', 'Password ga sama anjg');
    }

    if ($request->password <= 8) {
        return redirect()->back()->with('error', 'Password minimal 8 karakter');
    }

    if (User::where('username', $request->username)->exists()) {
        return redirect()->back()->with('error', 'Username sudah ada');
    }
    

    $request->validate([
        'nik' => 'required|numeric|unique:users,nik',
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|min:8|confirmed',
    ]);

    User::create([
        'nik' => $request->nik,
        'name' => $request->name,
        'username' => $request->username,
        'password' => Hash::make($request->password),
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
        $user = User::findOrFail($id);

        //user yg diupdate rules nya ambil dari UserRequests

        // Update hanya kolom yang diisi
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->nik = $request->nik;

        // Jika ada input password, hash dan simpan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

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
}


