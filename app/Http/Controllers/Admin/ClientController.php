<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Client::getData($request);
        return view('content.client.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|max:200|min:1",
            'adresse' => "nullable",
            'email' => "nullable|unique:clients,email",
            'phone' => "required|unique:clients,phone",
            'ville' => "required",
            'type_client' => "required",
        ]);
        Client::create($request->all());
        return redirect()->route('admin.client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('content.client.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('content.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => "required|max:200|min:1",
            'adresse' => "required",
            'phone' => "required|unique:clients,phone," . $client->id,
            'email' => "nullable|unique:clients,email," . $client->id,
            'ville' => "required",
            'type_client' => "required",
        ]);
        $client->update($request->all());
        return redirect()->route('admin.client.index')->with([
            "success" => "data update with success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->back()->with([
            "success" => "data delete with success"
        ]);
    }
}
