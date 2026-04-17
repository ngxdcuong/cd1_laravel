<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
{
    if ($request->expectsJson()) { // Kiểm tra nếu request là AJAX
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:3',
            'role' => 'required|in:admin,manager,staff',
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return response()->json(['status' => 'success', 'message' => 'Tạo tài khoản thành công!', 'user' => $user]);
    }

    return redirect()->route('users.index')->with('success', 'Tạo tài khoản thành công!');
}
    
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'role' => 'required|in:admin,manager,staff',
    ]);

    $data = [
        'username' => $request->username,
        'role' => $request->role,
    ];

    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('users.index')->with('success', 'Cập nhật tài khoản thành công.');
}


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Xóa tài khoản thành công.');
    }
}
