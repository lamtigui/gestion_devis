<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Devi;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Devi::getData();
        return view('content.devis.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $app_id = $request->query('rendez-vous');
        $appointement = Appointment::find($app_id);

        if (!$appointement) {
            return redirect()->route('admin.appointment.index')->with([
                "success" => "please shoose a rendez-vous"
            ]);
        }
        return view('content.devis.create', compact("appointement"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "n_devis" => "required|unique:devis,n_devis",
            "date" => "required",
            "quantite" => "required|min:1",
            "prix_unitaire" => "required",
            "prix_hors_taxe" => "required",
            "taux_tva" => "required",
            "remise_1" => "nullable",
            "mode_envoi" => "required",
            "etat" => "required",
            "appointment_id" => "required|exists:appointments,id"
        ]);

        Devi::create($request->all());
        return redirect()->route('admin.devis.index')->with([
            "success" => "devis create with success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Devi $devi)
    {
        return view('content.devis.show', compact('devi'));
    }

    /**
     * Display the specified resource.
     */
    public function devis_model($id)
    {
        $devi = Devi::find($id);
        return view('content.devis.model_form', compact('devi'));
    }
    public function generate_devi($id, Request $request)
    {
            $validatedData = $request->validate([
                'entreprise' => 'required',
                'afficher_partnaires' => 'required',
            ], [
                'entreprise.required' => "Veuillez saisir l'entreprise",
            ]);
            if ($validatedData) {
                $devi = Devi::find($id);
                $modeles_noms = Modele::pluck('nom')->toArray();
                $taux_remise = $devi->remise_1 + $devi->remise_2 + $devi->remise_3 + $devi->remise_4 + $devi->remise_5;
                $total_ht2 = $devi->prix_hors_taxe - $taux_remise;
                $entreprise = $validatedData['entreprise'];
                $afficher_partnaires = $validatedData['afficher_partnaires'];
                return match ($entreprise) {
                    'WINBEST' => view(
                        view: 'content.docdevis.winbest.create',
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires')
                    ),
                    'ARA' => view(  
                        view: 'content.docdevis.ara.create',
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires' )
                    ),
                    'ADN' => view(
                        view: 'content.docdevis.adn.create',
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires')
                    ),
                    'NSS' => view(
                        view: 'content.docdevis.nss.create',
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires')
                    ),
                    'MASTERPRO'=> view(
                        view:"content.docdevis.masterpro.create",
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires')
                    ),
                    'ENET'=> view(
                        view:"content.docdevis.enet.create",
                        data: compact('devi', 'total_ht2','modeles_noms', 'entreprise', 'afficher_partnaires')
                    ),
                    // 'OTHER_COMPANY' => view('other.devis', compact('devi')), 
                    default => abort(404, 'Company not found'),
                };
            }
        
        }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Devi $devi)
    {
        return view('content.devis.edit', compact('devi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Devi $devi)
    {
        $this->validate($request, [
            "n_devis" => "required|unique:devis,n_devis,{$devi->id}",
            "date" => "required",
            "prix_hors_taxe" => "required",
            "quantite" => "required|min:1",
            "prix_unitaire" => "required",
            "taux_tva" => "required",
            "remise_1" => "required",
            "mode_envoi" => "required",
            "etat" => "required",
        ]);

        $devi->update($request->all());
        return redirect()->route('admin.devis.index')->with([
            "success" => "devis updated with success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Devi $devi)
    {
        //
    }
}
