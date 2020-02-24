<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlighSchedule extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['flight_no', 'tail_id', 'tail_no', 'origin', 'destination', 'eta', 'std', 'etd', 'atd', 'ata'];
}
