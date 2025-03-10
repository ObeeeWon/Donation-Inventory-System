<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'items'; // Ensure it's pointing to the correct table

    protected $primaryKey = 'ItemID'; // Primary key column

    public $timestamps = true; // Laravel will manage created_at and updated_at timestamps

    protected $dates = ['created_at', 'updated_at', 'deleted_at']; // Include deleted_at for SoftDeletes

    protected $fillable = [
        'ItemName',
        'Barcode',
        'Quantity',
        'LowStockAlert',
        'Location'
    ];
}
