<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => 'required|string|in:admin,user',
        ]);

        // Admins dürfen sich nicht selbst die Adminrechte entziehen,
        // damit man sich nicht versehentlich aussperrt.
        if ($user->id === Auth::id() && $data['role'] !== 'admin') {
            return redirect()
                ->route('users.index')
                ->with('error', 'Du kannst Dir nicht selbst die Adminrechte entziehen.');
        }

        $user->update(['role' => $data['role']]);

        return redirect()
            ->route('users.index')
            ->with('success', "Rolle von {$user->name} wurde auf '{$data['role']}' gesetzt.");
    }
}
