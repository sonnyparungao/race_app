<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Horse  extends Model
{
    use Notifiable;

    public $primaryKey='horse_id';
    public  $table = 'horses';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'horse_name', 'horse_speed', 'horse_strength','horse_endurance',
        'jockey_name'
    ];

   
   
}
