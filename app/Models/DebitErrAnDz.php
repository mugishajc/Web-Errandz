<?php
namespace App\Models;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class DebitErrAnDz extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'debiterrandz';
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'description',
        'telephone',
       
    ];
    public function Task_Categories()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
