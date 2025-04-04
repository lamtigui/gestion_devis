<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_devis',
        'admin_id',
        'date',
        'prix_hors_taxe',
        'taux_tva',
        'autre_taux_tva',
        'remise_1',
        'date_remise_1',
        'detail_remise_1',
        'remise_2',
        'date_remise_2',
        'detail_remise_2',
        'remise_3',
        'date_remise_3',
        'detail_remise_3',
        'remise_4',
        'date_remise_4',
        'detail_remise_4',
        'remise_5',
        'date_remise_5',
        'detail_remise_5',
        'mode_envoi',
        'autre_mode_denvoi_devis',
        'etat',
        'appointment_id',
        'quantite',
        'prix_unitaire'
    ];
    function docdevis(){
        return $this->hasOne(Docdevi::class,"devis_id");
    }
    function isGenerated(){
        if($this->docdevis()->exists()){
            return true;
        }
        else{
        return false;
        }
    }
    public function getRemiseFinalAttrinute()
    {
        return $this->remise_1 + $this->remise_2 + $this->remise_3 + $this->remise_4 + $this->remise_5;
    }

    public function getMantantHTFinalAttrinute()
    {
        return $this->prix_hors_taxe - $this->getRemiseFinalAttrinute();
    }
    public function getNewTauxTvaAttribute()
    {
        if ($this->taux_tva === "autre") {
            return intval($this->autre_taux_tva);
        }

        return intval($this->taux_tva);
    }

    public function getMantantTvaAttribute()
    {
        return ($this->getNewTauxTvaAttribute() * $this->getMantantHTFinalAttrinute()) / 100;
    }
    public function getMantantTtcAttribute()
    {
        return $this->getMantantHTFinalAttrinute() + $this->getMantantTvaAttribute();
    }
    public function GetTypeDeServiceAttribute()
    {
        return $this->appointment->type_besoin . ' ' . $this->appointment->nature_services;
    }
    // Define relationships
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public static function getData()
    {
        $query = self::select("devis.*")
            ->with('appointment.client');

        if (request()->get('name')) {
            $clientname = request()->get('name');
            $query->whereHas('appointment.client', function ($q) use ($clientname) {
                $q->where('name', 'like', "%$clientname%");
            });
        }
        if (request()->get('n_devi')) {
            $n_devi = request()->get('n_devi');
            $query->where('n_devis' , $n_devi);
        }

        return $query->latest()->paginate(10);
    }
}
