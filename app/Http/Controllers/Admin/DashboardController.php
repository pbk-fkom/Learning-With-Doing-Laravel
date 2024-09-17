<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $productCount = Product::count();
        $transactionCount = Transaction::count();

        return view('admin.dashboard', compact('productCount', 'transactionCount'));
    }
}
