<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [

        'vehicle_id',
        'driver_id',
        'destination',
        'date_mission',
        'statut'

    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function getStatutAutoAttribute()
    {
    $today = now()->toDateString();

    if ($this->date_mission > $today) {

        return 'En attente';

    } elseif ($this->date_mission == $today) {

        return 'En cours';

    } else {

        return 'Terminée';
    }
    }



}