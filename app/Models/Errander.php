<?php

namespace App\Models;
use App\Models\User;
use App\Models\LiveLocation;
use App\Models\Account_status;
use App\Models\Task_status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Errander extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'category',
        'description',
        'live_location_id',
        
       
    ];
    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
   


}
