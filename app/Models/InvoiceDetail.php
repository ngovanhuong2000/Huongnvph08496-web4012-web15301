<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id',
        'product_id',
        'unit_price',
        'quantity',
    ];

    public function invoices()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }
}
