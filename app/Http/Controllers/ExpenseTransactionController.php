<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ExpenseTransactionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::where('types', 'out')->orderBy('id', 'desc')->get();
        $transactions->transform(function ($transaction) {
            $transaction->total = $transaction->details->sum('amount');
            return $transaction;
        });
        return view('contents/transactions/expense/index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all();
        return view('contents/transactions/expense/_form', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transactionDate = $request->transaction_date;
        if(Transaction::where('transaction_date', $transactionDate)->where('types', 'out')->exists()){
            return redirect()->back()->with('error', 'Tanggal transaksi pemasukan sudah ada silahkan cek kembali !!!');
        }
        try {
            $request->validate(
                [
                    'tenant_id' => 'required|exists:tenants,id',
                    'transaction_date' => 'required|date',
                    'notes' => 'nullable',
                ]
            );
            $numberCount = Transaction::where('transaction_date', $transactionDate)->withTrashed()->count();
            $id = 1000+$numberCount+1;
            $prefix = "TRXOUT-".date('Ymd', strtotime($request->transaction_date)).$id;
            Transaction::create([
                'invoice' => $prefix,
                'transaction_date' => $request->transaction_date,
                'types' => 'out',
                'notes' => $request->notes,
                'tenant_id' => $request->tenant_id,
                'created_by' => auth()->user()->id,
            ]);
            return redirect()->route('transactions-expense.index')->with('status', 'Data berhasil disimpan');
        } catch (\Exception $e) {
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
        $tenants = Tenant::all();

        $transaction = Transaction::find($id);
        return view('contents/transactions/expense/_form', compact('transaction', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate(
                [
                    'notes' => 'nullable',
                ]
            );
            $transaction = Transaction::find($id);
            $transaction->update([
                'notes' => $request->notes,
            ]);
            return redirect()->route('transactions-expense.index')->with('status', 'Data berhasil diupdate');
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
            $transaction = Transaction::find($id);
            $transaction->delete();
            return redirect()->route('transactions-expense.index')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dihapus '.$e->getMessage());
        }
    }
}
