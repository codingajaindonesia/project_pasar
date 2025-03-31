<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class IncomeTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $transactions = Transaction::where('types', 'in')->orderBy('id', 'desc')->get();
        $transactions->transform(function ($transaction) {
            $transaction->total = $transaction->details->sum('amount');
            return $transaction;
        });
        return view('contents/transactions/income/index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contents/transactions/income/_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transactionDate = $request->transaction_date;
        if(Transaction::where('transaction_date', $transactionDate)->where('types', 'in')->exists()){
            return redirect()->back()->with('error', 'Tanggal transaksi pemasukan sudah ada silahkan cek kembali !!!');
        }
        try {
            $request->validate(
                [
                    'transaction_date' => 'required|date',
                    'notes' => 'nullable',
                ]
            );
            Transaction::create([
                'invoice' => "TRXIN-".date('Ymd', strtotime($request->transaction_date)),
                'transaction_date' => $request->transaction_date,
                'types' => 'in',
                'notes' => $request->notes,
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil disimpan');
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
        $transaction = Transaction::find($id);
        return view('contents/transactions/income/_form', compact('transaction'));
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
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil diupdate');
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
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dihapus '.$e->getMessage());
        }
    }


}
