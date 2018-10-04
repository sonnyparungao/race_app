<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use Notifiable;



    public $primaryKey='race_id';
    public  $table = 'races';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'race_status', 'race_distance'
    ];

   

    public function raceDetails()
    {
        return $this->hasMany('App\Models\RaceDetails', 'race_id');
    }

}
