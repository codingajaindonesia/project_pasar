<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(isset(auth()->user()->id)){

            $data = array(
                'users' => User::count(),
                'income' => TransactionDetail::whereHas('transaction', function ($query) {
                    $query->where('types', 'in')->whereYear('transaction_date', date('Y'))->whereMonth('transaction_date', date('m'));
                })->sum('amount'),
                'expense' => TransactionDetail::whereHas('transaction', function ($query) {
                    $query->where('types', 'out')->whereYear('transaction_date', date('Y'))->whereMonth('transaction_date', date('m'));
                })->sum('amount'),
            );
            return view('contents/dashboard', compact('data'));
        }else{
            return view('contents/home');
        }
    }
}
