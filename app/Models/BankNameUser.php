<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankNameUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'iduser',
        'bank_user',
        'bank_numbar_user',
        'bank',
    ];
}