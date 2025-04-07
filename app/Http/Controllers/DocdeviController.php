<?php

namespace App\Http\Controllers;

use App\Models\Docdevi;
use App\Models\Devi;
use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
class DocdeviController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docdevis = DocDevi::with('devi')->paginate(8);
        return view('content.docdevis.index', compact('docdevis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generatePDF($id)
    {
        $docdevi = Docdevi::find($id);
        $devi = Devi::find($docdevi->devis_id);
        $societe = $docdevi->societe;
        $partenaire_img = $docdevi->partenaire_img;
        $taux_remise = $devi->remise_1 + $devi->remise_2 + $devi->remise_3 + $devi->remise_4 + $devi->remise_5;
        $total_ht2 = $devi->prix_hors_taxe - $taux_remise;
        $total_ttc = $total_ht2 + ($total_ht2 * $devi->taux_tva) / 100;
        $pdf = Pdf::loadView("content.docdevis.devis_generation.pdf.pdf_winbest", compact("devi", "total_ht2", "total_ttc", "taux_remise", "partenaire_img"));
        // return view("content.devis.devis_generation.pdf.pdf_winbest", compact("devi","total_ht2","total_ttc","taux_remise","partenaire_img"));
        return $pdf->download("devi_$devi->id" . ".pdf");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Docdevi::create([
            "devis_id" => $request->devis_id,
            "societe" => $request->societe,
            "partenaires_img" => filter_var($request->partenaires_img, FILTER_VALIDATE_BOOLEAN),
            "nom_client" => $request->nom_client,
            "mode_paiement" => $request->mode_paiement,
            "titre" => $request->titre,
            "prestation" => $request->prestation,
            "details" => $request->details,
            "politique" => $request->politique,
            // ARA 
            "conditions" => $request->conditions  ,
            "n_client" => $request->n_client ,
            "reference" => $request->reference ,
            "RC"=>$request->RC,
            "IF"=>$request->IF,
            "ICE"=>$request->ICE,

        ]);
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $devi = Devi::find($id);
        $docdevi = Docdevi::with("devi")->where('devis_id', $id)->first();
        $modeles_noms = Modele::pluck('nom')->toArray();
        $taux_remise = $devi->remise_1 + $devi->remise_2 + $devi->remise_3 + $devi->remise_4 + $devi->remise_5;
        $total_ht2 = $devi->prix_hors_taxe - $taux_remise;
        $entreprise = $docdevi->societe;
        $afficher_partnaires = $docdevi->partenaires_img;
        return match ($entreprise) {
            'WINBEST' => view("content.docdevis.winbest.show", compact("devi","modeles_noms", "docdevi", "entreprise", "afficher_partnaires", 'total_ht2')),
            'ARA' => view("content.docdevis.ara.show", compact("devi","modeles_noms", "docdevi", "entreprise", "afficher_partnaires", 'total_ht2')),
            'ADN' => view("content.docdevis.adn.show", compact("devi","modeles_noms", "docdevi", "entreprise", "afficher_partnaires", 'total_ht2')),
            'NSS' => view("content.docdevis.nss.show", compact("devi","modeles_noms", "docdevi", "entreprise", "afficher_partnaires", 'total_ht2')),
            'MASTERPRO' => view("content.docdevis.masterpro.show", compact("devi","modeles_noms", "docdevi", "entreprise", "afficher_partnaires", 'total_ht2')),
            default => abort(404, 'Company not found'),
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docdevi $docdevi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $docdevi = Docdevi::with('devi')->findOrFail($id);
        $docdevi->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docdevi = Docdevi::findOrFail($id);
        $docdevi->delete();
        return $this->index();
    }
}
