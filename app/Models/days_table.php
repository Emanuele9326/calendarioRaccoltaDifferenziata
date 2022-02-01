<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class days_table extends Model
{
    use HasFactory;
    protected $table= 'days_table';
   
    // Indicates if the model should be timestamped
    public $timestamps = false;
    protected $fillable = array('foreign_key');
    
    //Get the various collections and related times for each day of the week
    public function withdraw(){
     return $this->hasMany(withdrawal_table::class,'foreign_key');
    }
}
