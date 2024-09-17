<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }
}
