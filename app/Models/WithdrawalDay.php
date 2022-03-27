<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalDay extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['days','withdraw','start','end'];
}
