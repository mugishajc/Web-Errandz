<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loginotp extends Model
{
    use HasFactory;
    
    public $table = 'loginotp';
    protected $fillable = [
        'otp',
        'status',
        'user_id',
        'date',
        
  
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
