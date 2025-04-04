<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = [ "nom","societe","afficher_partenaires",'n_devis','titre',
        'prestation','details','politiques','mode_paiement',"nom_client",'quantité','prix_unitaire',
        "remise_1","remise_2","remise_3","remise_4","tva" ,
        "reference",  "conditions","n_client","RC","IF","ICE"
    ];

    public static function getData()
    {
        $data = self::select("tablename.*");


        return $data->latest()->paginate(10);
    }
    public function getTotalHtAttribute()
    {
        return intval($this->quantité) * intval($this->prix_unitaire) ;
    }
    public function getRemiseFinalAttrinute()
    {
        $result =  $this->remise_1 + $this->remise_2 + $this->remise_3 + $this->remise_4 + $this->remise_5;
        if($result === 0){
            return 0;
        }
        else{
            return $result;
        }
    }
    
    public function getMantantHTFinalAttrinute()
    {
        return $this->getTotalHtAttribute() - $this->getRemiseFinalAttrinute();
    }
    
    public function getMantantTvaAttribute()
    {
        return ($this->tva * $this->getMantantHTFinalAttrinute()) / 100;
    }
    public function getMantantTtcAttribute()
    {
        return $this->getMantantHTFinalAttrinute() + $this->getMantantTvaAttribute();
    }
    public function GetTypeDeServiceAttribute()
    {
        return $this->appointment->type_besoin . ' ' . $this->appointment->nature_services;
    }
}
