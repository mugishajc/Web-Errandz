<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Onlinestatus extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    public $table = 'onlinestatus';
    protected $fillable = [
        'user_id',
        'status',
        'last_login',
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }


}
