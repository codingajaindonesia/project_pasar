<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoiceMail;
use App\Models\Tenant;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $tenants = Tenant::all();

        return view('contents/transactions/income/_form', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transactionDate = $request->transaction_date;
    
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
            $prefix = "TRXIN-".date('Ymd', strtotime($request->transaction_date)).$id;
            Transaction::create([
                'tenant_id' => $request->tenant_id,
                'invoice' => $prefix ,
                'transaction_date' => $request->transaction_date,
                'types' => 'in',
                'notes' => $request->notes,
                'created_by' => auth()->user()->id,
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
        $tenants = Tenant::all();

        return view('contents/transactions/income/_form', compact('transaction', 'tenants'));
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

    public function approveInvoice(Request $request )  {
        try {
            $transaction = Transaction::find($request->id);
            $transaction->update([
                'status' => 'paid',
            ]);
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil diapprove');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal diapprove '.$e->getMessage());
        } 
    }
    public function rollbackInvoice(Request $request)  {
        try {
            $transaction = Transaction::find($request->id);
            $transaction->update([
                'status' => 'unpaid',
            ]);
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil dirollback');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dirollback '.$e->getMessage());
        }
        
    }
    public function sendInvoice(Request $request, $id)  {
        try {
            //Kirim Email SendInvoice Mail Status Invoice, nomor INvoice dan note
            $transaction = Transaction::where('id',$id)->first();
            Mail::to($transaction->tenant->user->email)->send(new SendInvoiceMail($transaction));
            return redirect()->route('transactions-income.index')->with('status', 'Data berhasil dikirim');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data gagal dikirim '.$e->getMessage());
            
        } 
    }

}
