<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\Transaction\StoreRequest;
use App\Http\Requests\Admin\Transaction\UpdateRequest;
use App\Http\Controllers\Controller;

use App\Models\Transaction;

use Carbon\Carbon;
use StdClass;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = $request->start_date ? Carbon::createFromFormat('d/m/Y', $request->start_date) : Carbon::now()->startOfDay();
        $end_date = $request->end_date ? Carbon::createFromFormat('d/m/Y', $request->end_date) : Carbon::now()->endOfDay();

        $transactions = Transaction::orderBy('created_at', 'desc');
        if($start_date < $end_date){
            $transactions = $transactions->whereBetween('created_at', [$start_date, $end_date]);
        }else {
            $transactions = $transactions->whereBetween('created_at', [$end_date, $start_date]);
            $temp = $start_date->copy();
            $start_date = $end_date->copy();
            $end_date = $temp->copy();
        }

        $transactions = $transactions->paginate(10);
        return view('admin.transaction.list')
            ->with('transactions', $transactions)
            ->with('start_date', $start_date)
            ->with('end_date', $end_date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $transaction = new Transaction();
        $transaction->fill([
            'category_id' => $request->category,
            'transaction_type' => $request->transaction_type,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        if(!$transaction->save()){
            return redirect()->route('admin.transaction.create')
                ->with('NOTIFY', 'danger')
                ->withInput($request->input());
        }

        return redirect()->route('admin.transaction.create')->with('NOTIFY', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('admin.transaction.edit')
            ->with('transaction', $transaction);
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
        $transaction = Transaction::findOrFail($id);
        $transaction->fill([
            'category_id' => $request->category,
            'transaction_type' => $request->transaction_type,
            'description' => $request->description,
            'amount' => $request->amount
        ]);

        if(!$transaction->save()){
            return redirect()->route('admin.transaction.edit', $id)
                ->with('NOTIFY', 'danger')
                ->withInput($request->input());
        }

        return redirect()->route('admin.transaction.edit', $id)->with('NOTIFY', 'success');
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
