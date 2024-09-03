<?php

namespace App\Http\Controllers\Customer;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(" customer.transaction ");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $generateInvoice = "INV" . date("Ymd") . Str::random(3);

        // dd($generateInvoice);

        $transaction = Transaction::create([
            "customer_id" => 2,
            "date" => now(),
            "transaction_code" => $generateInvoice,
        ]);


        Transaction_detail::create([
            "product_id" => $request->product_id,
            "id_transaction" => $transaction->id,
            "total" => $request->qty,
        ]);

        $cart = Cart::whereProductId($request->product_id)->whereUserId(1)->first();
        $cart->delete();

        return redirect()->route("carts.index");

        // dd($transaction->product_id);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
