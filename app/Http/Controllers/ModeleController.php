<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modeles = Modele::paginate(10);
        return view("content/modeles_devis/index", compact("modeles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $afficher_partenaires = filter_var($request->partenaires_img, FILTER_VALIDATE_BOOLEAN);
        $modele=Modele::create([
            "n_devis"=> $request->n_devis,
            "nom" => $request->nom,
            "societe" => $request->societe,
            "afficher_partenaires" => $afficher_partenaires,
            "titre" => $request->titre,
            "prestation" => $request->prestation,
            "details" => $request->details,
            "politique" => $request->politique,
            "mode_paiement" => $request->mode_paiement,
            "conditions" => $request->conditions,

        ]);
        $modele->politique = $request->politique;
        $modele->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Modele $modele)
    {
        return match ($modele->societe) {
            'WINBEST' => view(
                view: 'content.modeles_devis.show.winbest',
                data: compact('modele')
            ),
            'ARA' => view(
                view: 'content.modeles_devis.show.ara',
                data: compact('modele')
            ),
            'ADN' => view(
                view: 'content.modeles_devis.show.adn',
                data: compact('modele')
            ),
            'NSS' => view(
                view: 'content.modeles_devis.show.nss',
                data: compact('modele')
            ),
            'MASTERPRO' => view(
                view: 'content.modeles_devis.show.masterpro',
                data: compact('modele')
            ),
            
            default => abort(404, 'Company not found'),
        };
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $modele)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modele $modele)
    {
        $validate = $request->validate([
            "n_devis"=>"unique:modeles,n_devis,".$modele->id,
        ],[
            "n_devis.unique"=>"Ce numéro existe déjà"
        ]);
        
        $modele->update([
            "titre" => $request->titre,
            "prestation" => $request->prestation,
            "details" => $request->details,
            "politique" => $request->politique,
            "mode_paiement" => $request->mode_paiement,
            "nom_client"=>$request->nom_client,
            "quantité"=>$request->quantite,
            "prix_unitaire"=>$request->prix_unitaire,
            "remise_1"=>$request->remise_1 ? $request->remise_1 : null,
            "remise_2"=>$request->remise_2 ? $request->remise_2 : null,
            "remise_3"=>$request->remise_3 ? $request->remise_3 : null,
            "remise_4"=>$request->remise_4 ? $request->remise_4 : null,
            "remise_5"=>$request->remise_5 ? $request->remise_5 : null,
            "conditions" => $request->conditions,
            "tva"=>$request->tva,
            "reference" => $request->reference,
            "n_client" => $request->n_client,
            "RC" => $request->RC,
            "IF" => $request->IF,
            "ICE" => $request->ICE,
        ]);
        $modele->politique = $request->politique;
        $modele->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $modele)
    {
        $modele->delete();
        return $this->index();
    }
}
