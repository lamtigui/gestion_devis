<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docdevi extends Model
{
    use HasFactory;

    protected $fillable = [
        'devis_id', 'societe', 'partenaires_img', 'nom_client', 'titre', 
        'prestation', 'details', 'politique',"mode_paiement",
        "reference" , "n_client", "conditions","RC","IF","ICE"
    ];
    public static function getData()
    {
        $data = self::select("tablename.*");


        return $data->latest()->paginate(10);
    }
    public function devi(){
        return $this->belongsTo(Devi::class,"devis_id");
    }

}
