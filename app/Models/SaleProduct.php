<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    use HasFactory;

    protected $table='sale_products';
    protected $guarded=[];

    public function SaleProductData(){
        return $this->hasMany(SaleProductData::class,'sale_id','id');
    }
}
