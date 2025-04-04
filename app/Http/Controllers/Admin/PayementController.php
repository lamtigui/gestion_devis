<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\Payement;
use Illuminate\Http\Request;

class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $facture = Facture::findOrFail($request->facture_id);
        return view('content.payement.create', compact('facture'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'facture_id' => "required|exists:factures,id",
            'mode' => "required",
            'montant' => "required",
            'date_paiement' => "required",
        ]);
        Payement::create($request->all());

        $facture_id = $request->facture_id;

        // Redirect to the facture.show route with success message
        return redirect()->route('admin.factures.show', ['facture' => $facture_id])
            ->with('success', 'Payment created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payement $payement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payement $payement)
    {
        return view('content.payement.edit',compact('payement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payement $payement)
    {
        $this->validate($request, [
            'mode' => "required",
            'montant' => "required",
            'date_paiement' => "required",
        ]);
        $payement->update($request->all());

        $facture_id = $payement->facture_id;

        // Redirect to the facture.show route with success message
        return redirect()->route('admin.factures.show', ['facture' => $facture_id])
            ->with('success', 'Payment created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payement $payement)
    {
        dd('payement deleted');
        $facture_id = $payement->facture_id;
        $payement->delete();

        return redirect()->route('admin.factures.show', ['facture' => $facture_id])
            ->with('success', 'Payment deleted successfully');
    }
}
