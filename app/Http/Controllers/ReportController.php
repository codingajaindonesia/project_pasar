<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function income(Request $request) {
        
        $startDate = $request->get('start_date') ?? date('Y-m-d');
        $endDate = $request->get('end_date') ?? date('Y-m-d');
        if ($startDate && $endDate) {
            $transactions = Transaction::where('types', 'in')
                ->whereBetween('transaction_date', [$startDate, $endDate])
                ->orderBy('transaction_date', 'desc')
                ->get();
        } else {
            $transactions = Transaction::where('types', 'in')->orderBy('transaction_date', 'desc')->get();
        }
        $transactions->transform(function ($transaction) {
            $transaction->total = $transaction->details->sum('amount');
            return $transaction;
        });
        return view('contents/reports/income', compact('transactions', 'startDate', 'endDate'));
    }

    public function incomeUser(Request $request) {
        

        $tenant = Tenant::where('user_id', Auth::user()->id)->first();
        $transactions = Transaction::where('types', 'in')->where('tenant_id', $tenant->id)->orderBy('transaction_date', 'desc')->get();
        $transactions->transform(function ($transaction) {
            $transaction->total = $transaction->details->sum('amount');
            return $transaction;
        });
        return view('contents/reports/income-user', compact('transactions'));
    }
    public function detailInvoice(Request $request, $id)  {
        $transactions = TransactionDetail::where('transaction_id', $id)->orderBy('id', 'desc')->get();
        return view('contents/reports/detail-income', compact('transactions', 'id'));
    }
    public function expense(Request $request) {
        
        $startDate = $request->get('start_date') ?? date('Y-m-d');
        $endDate = $request->get('end_date') ?? date('Y-m-d');
        if ($startDate && $endDate) {
            $transactions = Transaction::where('types', 'out')
                ->whereBetween('transaction_date', [$startDate, $endDate])
                ->orderBy('transaction_date', 'desc')
                ->get();
        } else {
            $transactions = Transaction::where('types', 'out')->orderBy('transaction_date', 'desc')->get();
        }
        $transactions->transform(function ($transaction) {
            $transaction->total = $transaction->details->sum('amount');
            return $transaction;
        });
        return view('contents/reports/expense', compact('transactions', 'startDate', 'endDate'));
    }
    public function all(Request $request) {
        
        $startDate = $request->get('start_date') ?? date('Y-m-d');
        $endDate = $request->get('end_date') ?? date('Y-m-d');
        if ($startDate && $endDate) {
            $transactions = TransactionDetail::whereHas('transaction', function($query) use($startDate, $endDate) {
                return $query->whereBetween('transaction_date', [$startDate, $endDate]);
            })->get();
        } 
        $income = TransactionDetail::whereHas('transaction', function($query) use($startDate, $endDate) {
            return $query->whereBetween('transaction_date', [$startDate, $endDate])->where('types', 'in');
        })->sum('amount');
        $expense = TransactionDetail::whereHas('transaction', function($query) use($startDate, $endDate) {
            return $query->whereBetween('transaction_date', [$startDate, $endDate])->where('types', 'out');
        })->sum('amount');
        $total = $income-$expense;
        return view('contents/reports/all', compact('transactions', 'startDate', 'endDate', 'income', 'expense', 'total'));
    }
}
