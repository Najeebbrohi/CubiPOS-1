<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProductData extends Model
{
    use HasFactory;
    
    protected $table='sale_products_data';
    protected $guarded=[];

    public function SaleProduct(){
        return $this->belongsTo(SaleProduct::class,'sale_id');
    }
    public function Product(){
        return $this->belongsTo(product::class,'product_id');
    }
}


