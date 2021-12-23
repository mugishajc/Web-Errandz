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
        'job_requests_status',    
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\Task','id');
    }


    public function Runner()
    {
        return $this->belongsTo('App\Models\User','runnerID');
    }
}
