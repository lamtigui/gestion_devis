<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\Devi;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\Modele;
use App\Models\Docdevi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $clients = Client::latest()->take(4)->get(['name', 'phone']);

        $data = Devi::getData();
        $prospectsCount = Client::count();
        $devisCount = Devi::count();
        $docdevisCount = Docdevi::count();
        $appointmentsCount = Appointment::count();
        $modeleCount = Modele::count();
        $factureCount = Facture::count();
        
        // Total de toutes les données
        $total = $prospectsCount +  $devisCount + $docdevisCount + $appointmentsCount +$modeleCount +$factureCount;
        
        // Calculer les pourcentages
        $stats = [
            'Prospects' => [
                'count' => $prospectsCount,
                'percentage' => ($prospectsCount / $total) * 100
            ],
            'devis' => [
                'count' => $devisCount,
                'percentage' => ($devisCount / $total) * 100
            ],
            'Devis Générés' => [
                'count' => $docdevisCount,
                'percentage' => ($docdevisCount / $total) * 100
            ],
            'appointments' => [
                'count' => $appointmentsCount,
                'percentage' => ($appointmentsCount / $total) * 100
            ],
            'modele' => [
                'count' => $modeleCount,
                'percentage' => ($modeleCount / $total) * 100
            ],
            'facture' => [
                'count' => $factureCount,
                'percentage' => ($factureCount / $total) * 100
            ]
        ];
        return view('index', compact('data', 'stats' ,'clients'));
        
    }
    public function HistoriquePaiement(Request $request)
    {
        $data = Facture::getData(true);
        return view('content.HistoriquePayement',compact('data'));
    }

}
