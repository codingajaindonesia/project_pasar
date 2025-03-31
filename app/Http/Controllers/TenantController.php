<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::with('user', 'location')->get();
        return view('contents/tenants/index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return view('contents/tenants/_form', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
        }
        try {
            DB::beginTransaction();
            $request->validate(
                [
                    'location_id' => 'required|exists:locations,id',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'required|min:8',
                    'password_confirmation' => 'required|min:8',
                    'phone' => 'nullable',
                    'address' => 'nullable'
                ]
            );
           
            $payload = $request->all();
            $payload['password'] = bcrypt($request->password);
            $user = User::create($payload);

            Tenant::create([
                'user_id' => $user->id,
                'location_id' => $request->location_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            DB::commit();
            return redirect()->route('tenants.index')->with('status', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal disimpan '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = Tenant::with('user', 'location')->findOrFail($id);
        $locations = Location::all();
        return view('contents/tenants/_form', compact('tenant', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak sama');
        }
        try {
            DB::beginTransaction();
            $request->validate(
                [
                    'location_id' => 'required|exists:locations,id',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'username' => 'required',
                    'name' => 'required',
                    'email' => 'required|email',
                    'password' => 'nullable|min:8',
                    'password_confirmation' => 'nullable|min:8',
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
            if ($request->password) {
                $payload['password'] = bcrypt($request->password);
            }
            $tenant = Tenant::findOrFail($id);
            $tenant->update([
                'location_id' => $request->location_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            $tenant->user->update($payload);
           
            DB::commit();
            return redirect()->route('tenants.index')->with('status', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal disimpan '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $tenant = Tenant::findOrFail($id);
            $user = User::findOrFail($tenant->user_id);
            $tenant->delete();
            $user->delete();
            DB::commit();
            return redirect()->route('tenants.index')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Data gagal dihapus '.$e->getMessage());
        }
    }
}
