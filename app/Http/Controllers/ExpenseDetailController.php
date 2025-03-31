<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ExpenseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $transactions = TransactionDetail::where('transaction_id', $id)->orderBy('id', 'desc')->get();
        return view('contents/transactions/expense/detail/index', compact('transactions', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $categories = Category::where('types', 'out')->get();
        return view('contents/transactions/expense/detail/_form', compact('categories', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
       try {
        $request->validate([
            'category_id' => 'required',
            'amount' => 'required|numeric',
            'notes' => 'nullable|string|max:255',
        ]);

        TransactionDetail::create([
            'transaction_id' => $id,
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'types' => 'out',
        ]);

        return redirect('transactions-expense/'. $id.'/detail/')->with('success', 'Transaction detail created successfully.');
       } catch (\Throwable $th) {
        
        return redirect()->back()->with('error', 'Failed to create transaction detail: ' . $th->getMessage());
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
    public function edit(Request $request, $id, string $detailID)
    {
        $transaction = TransactionDetail::findOrFail($detailID);
        $categories = Category::where('types', 'out')->get();
        return view('contents/transactions/expense/detail/_form', compact('transaction', 'categories', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, string $detailID)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'amount' => 'required|numeric',
                'notes' => 'nullable|string|max:255',
            ]);

            $transaction = TransactionDetail::findOrFail($detailID);
            $transaction->update([
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'notes' => $request->notes,
            ]);

            return redirect('transactions-expense/'. $id.'/detail/')->with('success', 'Transaction detail updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to update transaction detail: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id, string $detailID)
    {
        try {
            $transaction = TransactionDetail::findOrFail($detailID);
            $transaction->delete();

            return redirect()->back()->with('success', 'Transaction detail deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete transaction detail: ' . $th->getMessage());
        }
    }
}
