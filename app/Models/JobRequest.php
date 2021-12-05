<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class JobRequest extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'taskID',
        'runnerID',    
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\Task','id');
    }
}
