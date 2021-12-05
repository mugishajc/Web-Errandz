<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class LiveLocation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'name_address',
        'latitude',
        'longitude',
        'date',
        'time',
        'status',

           
    ];
    public function UserLiveLocation()
    {
        return $this->belongsTo('App\Models\UserLiveLocation','user_id');
    }

}
