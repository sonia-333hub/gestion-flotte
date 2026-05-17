<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Vehicle;
use App\Models\Driver;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Afficher la liste des missions
     */
    public function index()
    {
        $missions = Mission::with(
            'vehicle',
            'driver'
        )->get();

        return view(
            'missions.index',
            compact('missions')
        );
    }

    /**
     * Formulaire création mission
     */
    public function create()
    {
        $vehicles = Vehicle::all();

        $drivers = Driver::all();

        return view(
            'missions.create',
            compact(
                'vehicles',
                'drivers'
            )
        );
    }

    /**
     * Enregistrer mission
     */
    public function store(Request $request)
    {
        $request->validate([

            'vehicle_id' => 'required',

            'driver_id' => 'required',

            'destination' => 'required',

            'date_mission' => 'required',

        ]);

        $mission = Mission::create([

            'vehicle_id' => $request->vehicle_id,

            'driver_id' => $request->driver_id,

            'destination' => $request->destination,

            'date_mission' => $request->date_mission,

            'statut' => 'En cours',

        ]);

        /*
        |-------------------------------------------
        | Véhicule automatiquement en mission
        |-------------------------------------------
        */

        $vehicle = Vehicle::find(
            $request->vehicle_id
        );

        $vehicle->statut = 'En mission';

        $vehicle->save();

        return redirect()
            ->route('missions.index');
    }

    /**
     * Formulaire modification
     */
    public function edit(Mission $mission)
    {
        $vehicles = Vehicle::all();

        $drivers = Driver::all();

        return view(
            'missions.edit',
            compact(
                'mission',
                'vehicles',
                'drivers'
            )
        );
    }

    /**
     * Mise à jour mission
     */
    public function update(
        Request $request,
        Mission $mission
    )
    {
        $request->validate([

            'vehicle_id' => 'required',

            'driver_id' => 'required',

            'destination' => 'required',

            'date_mission' => 'required',

            'statut' => 'required',

        ]);

        $mission->update([

            'vehicle_id' => $request->vehicle_id,

            'driver_id' => $request->driver_id,

            'destination' => $request->destination,

            'date_mission' => $request->date_mission,

            'statut' => $request->statut,

        ]);

        /*
        |-------------------------------------------
        | Gestion automatique statut véhicule
        |-------------------------------------------
        */

        $vehicle = Vehicle::find(
            $mission->vehicle_id
        );

        if ($mission->statut == 'Terminée') {

            $vehicle->statut = 'Disponible';

        } else {

            $vehicle->statut = 'En mission';

        }

        $vehicle->save();

        return redirect()
            ->route('missions.index');
    }

    /**
     * Supprimer mission
     */
    public function destroy(Mission $mission)
    {
        /*
        |-------------------------------------------
        | Rendre véhicule disponible
        |-------------------------------------------
        */

        $vehicle = Vehicle::find(
            $mission->vehicle_id
        );

        if ($vehicle) {

            $vehicle->statut = 'Disponible';

            $vehicle->save();
        }

        $mission->delete();

        return redirect()
            ->route('missions.index');
    }
}