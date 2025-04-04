<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Devi;
use Illuminate\Http\Request;

class RemiseController extends Controller
{
    public function RemiseOfDevis(Devi $devi)
    {
        return view('content.devis.remise', compact('devi'));
    }
    public function UpdateRemises(Devi $devi,Request $request)
    {
        $devi->update($request->all());
        return redirect()->route('admin.devis.index')->with([
            "success" => "devi remises update with success"
        ]);
    }
}
