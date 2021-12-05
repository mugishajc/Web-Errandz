<?php

namespace App\Models;
use App\Models\Task_categories;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'task';
    protected $fillable = [
        'category_id',
        'sourceLatitude',
        'sourceLongitude',
        'destinationLatitude',
        'destinationLongitude',
        'title',
        'description',
        'user_id',
        'single_pointLatitude',
        'single_pointLongitude',
        'photo_url1',
        'photo_url2',
        'price',
        'currency',
        'status_id',
        'date',
        'time',
    ];
    public function Task_Categories()
    {
        return $this->belongsTo('App\Models\Task_categories','category_id');
    }

}
