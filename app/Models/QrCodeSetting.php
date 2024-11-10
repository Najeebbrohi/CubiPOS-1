<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCodeSetting extends Model
{
    use HasFactory;
    protected $table='qr_code_settings';
    protected $guarded=[];
}
