<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $user = auth()->user();
        return view('contents.profile.index', compact('user'));
    }
    public function update(Request $request, $id) {
        $request->validate(
            [
                'username' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:8',
                'password_confirmation' => 'nullable|min:8',
                'phone' => 'nullable',
                'address' => 'nullable'

            ]
        );
    
        try {
            $user = auth()->user();
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            return redirect()->route('profile.index')->with('status', 'Profile berhasil diupdate');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Profile gagal diupdate '.$th->getMessage());

        }
    }
}
