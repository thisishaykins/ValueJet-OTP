<?php

namespace App\Http\Controllers;

use App\FlighSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlighScheduleController extends Controller
{

    protected $guarded = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FlighSchedule $flight_schedule)
    {
        $flight_schedule = $flight_schedule::groupBy('tail_no')->latest()->paginate(20);
        return view('flight_schedule.index', ['flight_schedules' => $flight_schedule]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flight_schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'flight_number' => 'required|numeric|max:20',
        //     'tail_no' => 'required|string|max:10',
        //     'origin' => 'required|string|max:10',
        //     'destination' => 'required|string|max:10',
        //     'eta' => 'required|string|max:15',
        //     'std' => 'required|string|max:15',
        //     'etd' => 'nullable|string|max:15',
        //     'atd' => 'nullable|string|max:15',
        //     'ata' => 'nullable|string|max:15',
        // ]);
        
        FlighSchedule::create([
            "flight_no" => $request->flight_number,
            "tail_no" => $request->tail_no,
            "origin" => $request->origin,
            "destination" => $request->destination,
            "eta" => $request->eta,
            "std" => $request->std,
            "etd" => $request->etd,
            "atd" => $request->atd,
            "ata" => $request->ata,
        ]);

        return redirect()->route('flight-schedule.index')
                        ->withStatus(__("Flight schedule created successfully."));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlighSchedule  $flighSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(FlighSchedule $flighSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlighSchedule  $flighSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(FlighSchedule $flighSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlighSchedule  $flighSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlighSchedule $flighSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlighSchedule  $flighSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlighSchedule $flighSchedule)
    {
        //
    }
}
