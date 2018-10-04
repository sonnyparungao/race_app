<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RaceDetails extends Model
{
    use Notifiable;

    public $primaryKey='race_details_id';
    public  $table = 'race_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'race_id', 'horse_id', 'distance_covered','horse_position',
        'cur_time'
    ];

   
}
