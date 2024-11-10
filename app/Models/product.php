<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function category(){
      return $this->belongsTo(category::class,'category_id');
    }

    public function SaleProductData(){
        return $this->hasMany(SaleProductData::class,'product_id','id');
    }
}
