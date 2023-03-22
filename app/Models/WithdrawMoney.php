<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawMoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'point_low',
        'status',
    ];
}