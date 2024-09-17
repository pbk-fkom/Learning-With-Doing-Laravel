<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction_detail;
use Illuminate\Http\Request;

class TransactionController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $transactionDetail = Transaction_detail::latest()->get();
        
        return view('admin.transaction', [
            'transactionDetail' => $transactionDetail,
        ]);
    }
}
