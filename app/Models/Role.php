<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Role extends Model
{
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'role_name',
        'description',
       
    ];

}
