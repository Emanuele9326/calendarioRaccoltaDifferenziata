<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conf_ora extends Model
{
    use HasFactory;
    protected $table='conf_ora';
    protected $primaryKey = 'idG';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable=['idG','conferimento','oraInizio','oraFine'];
}
