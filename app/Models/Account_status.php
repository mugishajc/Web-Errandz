<?php

namespace App\Models;

use App\Models\User;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Account_status extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public $table = 'account_status';
    protected $fillable = [
        'user_id',
        'role_id',
        'name',
        'description',
       ];

       public function User()
       {
           return $this->belongsTo('App\Models\User','user_id');
       }
       public function Role()
       {
           return $this->belongsTo('App\Models\Role','role_id');
       }

}
