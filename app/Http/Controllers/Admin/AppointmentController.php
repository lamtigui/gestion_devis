<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Appointment::getData();
        return view('content.rendez-vous.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $client_id = $request->query('client_id');
        $client = Client::find($client_id);

        if (!$client) {
            abort(404);
        }
        return view('content.rendez-vous.create', compact("client"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'clint_id',
            'date_demande',
            'origine',
            'type_cadence',
            'type_besoin',
        ]);
        $client = Client::find($request->client_id);
        if ($client) {
            $client->entreprise_name = $request->entreprise_name;
            $client->save();
        }
        Appointment::create($request->all());
        return redirect()->route('admin.appointment.index')->with([
            "success" => "appointement create with success",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        return view('content.rendez-vous.edit' , compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request, [
            'clint_id',
            'date_demande'=>"required|date",
            'origine'=>"required",
            'type_cadence'=>"required",
            'type_besoin'=>"required",
        ]);
        // dd($request->all());
        $appointment->update($request->all());
        return redirect()->route('admin.appointment.index')->with([
            "success" => "appointement update with success",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
