<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total_saldo = 0;
        $total_receive = 0;
        $total_spend = 0;

        $transactions = Transaction::get();

        foreach ($transactions as $key => $transaction) {
            if($transaction->transaction_type == 'receive'){
                $total_saldo += $transaction->amount;
                $total_receive += $transaction->amount;
            } else {
                $total_saldo -= $transaction->amount;
                $total_spend += $transaction->amount;
            }
        }

        $first_transaction = Transaction::orderBy('created_at', 'asc')->first();
        $last_transaction = Transaction::orderBy('created_at', 'desc')->first();

        return view('admin.home')
            ->with('total_saldo', $total_saldo)
            ->with('total_spend', $total_spend)
            ->with('total_receive', $total_receive)
            ->with('transactions', $transactions)
            ->with('first_transaction', $first_transaction)
            ->with('last_transaction', $last_transaction);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
