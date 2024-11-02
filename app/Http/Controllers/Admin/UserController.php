<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['mentor', 'dosen'])->get();
        return view('admin.users.index', compact('users'));
    }
    

    public function create()
    {
        $positions = Position::all(); // Ambil semua posisi
        return view('admin.users.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:mentor,dosen',
            'position_id' => 'required|exists:positions,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'position_id' => $request->position_id,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil dibuat.');
    }

    public function edit(User $user)
    {
        $positions = Position::all(); // Ambil semua posisi
        return view('admin.users.edit', compact('user', 'positions')); // Kirim posisi ke view
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // Hapus 'confirmed'
            'role' => 'required|string|in:mentor,dosen',
            'position_id' => 'required|exists:positions,id',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->role = $request->role;
        $user->position_id = $request->position_id;
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}