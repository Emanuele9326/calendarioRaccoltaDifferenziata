<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class withdrawal_table extends Model
{
    use HasFactory;
    protected $table= 'withdrawal_table';
    
    // Indicates if the model should be timestamped
    public $timestamps = false;
    protected $fillable = array('foreign_key', 'material', 'start_now','end_now');
    
    //One To Many (Inverse) / Belongs To
    public function day(){
        return $this->belongsTo(days_table::class,'foreign_key');
    }
}
