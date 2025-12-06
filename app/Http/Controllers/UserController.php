<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.only');
    }

    // List user
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Form create user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'role'     => 'required|in:admin,member,seller',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'role'            => $request->role,
            'password'        => Hash::make($request->password),
            'profile_picture' => $request->profile_picture ?? null,
            'phone_number'    => $request->phone_number ?? null,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dibuat');
    }

    // Show detail user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Form edit user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:admin,member,seller',
            'password' => 'nullable|min:6',
        ]);

        $data = $request->only(['name', 'email', 'role', 'phone_number', 'profile_picture']);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');
    }

    // Delete user
    public function destroy(User $user)
    {
        // Admin tidak boleh hapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return back()->withErrors([
                'delete' => 'Anda tidak bisa menghapus akun Anda sendiri.'
            ]);
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }
}
