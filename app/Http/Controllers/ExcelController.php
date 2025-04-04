<?php

namespace App\Http\Controllers;

use App\Exports\ClientFacturesExport;
use App\Exports\CompanyFacturesExport;
use App\Models\Facture;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function ExportFactures()
    {
        $data = Facture::getData(false);
        return Excel::download(new CompanyFacturesExport($data) ,'facturesList.xlsx');
    }
    public function ExportFacturesForUser()
    {
        $data = Facture::getData(false);
        return Excel::download(new ClientFacturesExport($data) ,'ClientFacturesList.xlsx');
    }
}
