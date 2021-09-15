<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pma_product extends Model
{
    use SoftDeletes;
    

    protected $fillable = ['product_sku', 'vendor_id', 'name', 'quantity', 'capital_price', 'price', 'deleted_at'];
    protected $table = 'pma_products';
    protected $primaryKey = 'product_sku';
   	protected $dates = ['deleted_at'];
}
