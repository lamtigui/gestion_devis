<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facture;
use App\Models\Devi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = Devi::getData();
        return view('index', compact('data'));
    }
    public function HistoriquePaiement(Request $request)
    {
        $data = Facture::getData(true);
        return view('content.HistoriquePayement',compact('data'));
    }

}
