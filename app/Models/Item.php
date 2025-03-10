<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items'; 

    protected $primaryKey = 'ItemID'; 

    public $timestamps = true; // Laravel will set the time stamp

    protected $fillable = [
        'ItemName',
        'Barcode',
        'Quantity',
        'LowStockAlert',
        'Location'
    ];
}