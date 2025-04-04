<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devi;
use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        // Filtrer les factures signées seulement
        $data = Facture::where('status', 2)->paginate(10);
        return view('content.factures.index', compact('data'));
    }

    public function create(Request $request)
    {
        if ($request->has('devis')) {
            $devi = Devi::find($request->devis);
            return view('content.factures.create', compact('devi'));
        }
        return view('content.factures.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'n_facture' => "required|unique:factures,n_facture",
            "date_facture" => "required",
            'client_name' => "required_without:devis_id",
            'etableur_name' => "required",
            'emmeteur_name' => "required",
            'remise' => "required_without:devis_id|numeric",
            'type_service_validation' => "required_without:devis_id",
            'mantant_ht' => "required_without:devis_id",
        ]);
        
        if ($request->has('devis_id')) {
            $this->validate($request, [
                'date_validation' => "required",
                'type_validation' => "required",
            ]);
        }
        
        // Création de la facture avec état "signée" par défaut
        $factureData = $request->all();
        $factureData['status'] = 2; // Définir l'état comme "signée" par défaut
        Facture::create($factureData);
        
        return redirect()->route('admin.factures.index')->with("success", "Facture créée avec succès");
    }

    public function show(Facture $facture)
    {
        return view('content.factures.show', compact('facture'));
    }

    public function edit(Facture $facture)
    {
        return view('content.factures.edit', compact('facture'));
    }

    public function update(Request $request, Facture $facture)
    {
        $this->validate($request, [
            'n_facture' => "required|unique:factures,n_facture,{$facture->id}",
            "date_facture" => "required",
            'client_name' => "required_without:devis_id",
            'etableur_name' => "required",
            'emmeteur_name' => "required",
            'date_validation' => "required",
            'remise' => "required_without:devis_id|numeric",
            'type_validation' => "required",
            'type_service_validation' => "required_without:devis_id",
            'mantant_ht' => "required_without:devis_id",
        ]);
        
        $facture->update($request->all());
        
        return redirect()->route('admin.factures.index')->with("success", "Facture mise à jour avec succès");
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();
        return redirect()->route('admin.factures.index')->with("success", "Facture supprimée avec succès");
    }
}
