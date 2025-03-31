<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'staff'])->get();
        return view('contents/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('contents/users/_form');
        return view('contents/users/_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      

        try {
            $request->validate(
                [
                    'username' => 'required',
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                    'password_confirmation' => 'required|min:8',
                    'role' => 'required|in:admin,user',
                    'phone' => 'nullable',
                    'address' => 'nullable'
                ]
            );
            if ($request->password !== $request->password_confirmation) {
                return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
            }
            $payload = $request->all();
            $payload['password'] = bcrypt($request->password);
            User::create($payload);
            return redirect()->route('users.index')->with('status', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal disimpan '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('contents/users/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('contents/users/_form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate(
                [
                    'username' => 'required',
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'nullable|min:8',
                    'password_confirmation' => 'nullable|min:8',
                    'role' => 'required|in:admin,user',
                    'phone' => 'nullable',
                    'address' => 'nullable'

                ]
            );
        
            $payload = [
                'username' => $request->username,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'phone' => $request->phone,
                'address' => $request->address
            ];
            if(isset($request->password)) {
                if( $request->password !== $request->password_confirmation) {
                    return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
                }
                $payload = array_merge($payload, ['password' => bcrypt($request->password)]);
            }
            $user = User::find($id);
            $user->update($payload);
            return redirect()->route('users.index')->with('status', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diupdate '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('users.index')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dihapus '.$e->getMessage());
        }
    }
}
