<?php

namespace App\Models;

use App\Enums\FactureStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_facture',
        "date_facture",
        'client_name',
        'status',
        'admin_id',
        'etableur_name',
        'alternative',
        'emmeteur_name',
        'date_validation',
        'type_validation',
        'remise',
        'autre_type_validation',
        'type_service_validation',
        'autre_type_service',
        'taux_tva',
        'autre_taux_tva',
        'mantant_ht',
        'numero_livraison',
        'date_livraison',
        "devis_id"
    ];

    protected $casts = [
        "status" => FactureStatus::class
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, "admin_id");
    }

    public function devis()
    {
        return $this->belongsTo(Devi::class);
    }

    public function Payement()
    {
        return $this->hasMany(Payement::class);
    }

    public static function getData($showPaginations = true)
    {
        $data = self::select("factures.*")
            ->leftJoin('devis', 'factures.devis_id', '=', 'devis.id')
            ->leftJoin('appointments', 'devis.appointment_id', '=', 'appointments.id')
            ->leftJoin('clients', 'clients.id', '=', 'appointments.client_id');

        if (request()->get('payment_status')) {
            $status = request()->get('payment_status');
            $data->where('factures.status',  $status);
        }

        if (request()->get('n_facture')) {
            $n_facture = request()->get('n_facture');
            $data->where('factures.n_facture', 'like', "%$n_facture%");
        }

        if (request()->get('client')) {
            $name = request()->get('client');
            $data->where(function ($query) use ($name) {
                $query->where('clients.nom_complet', 'like', "%$name%")
                    ->orWhere('factures.alternative', 'like', "%$name%")
                    ->orWhere('factures.client_name', 'like', "%$name%");
            });
        }

        if (request()->get('n_remise')) {
            $nRemise = request()->get('n_remise');
            $data->join('payements', 'factures.id', '=', 'payements.facture_id')
                ->where('payements.numero_remise', $nRemise);
        }

        if (request()->get('date_debut')) {
            $dateDebut = request()->get('date_debut');
            $data->whereDate('factures.date_facture', '>=', $dateDebut);
        }

        if (request()->get('date_fin')) {
            $dateFin = request()->get('date_fin');
            $data->whereDate('factures.date_facture', '<=', $dateFin);
        }

        if ($showPaginations) {
            return $data->latest('factures.created_at')->paginate(10);
        } else {
            return $data->latest('factures.created_at')->get();
        }
    }

    public function getPrixHTInitial()
    {
        if ($this->devis_id) {
            return $this->devis->prix_hors_taxe;
        } else {
            return $this->mantant_ht;
        }
    }

    public function getTauxTva()
    {
        if ($this->devis_id) {
            return $this->devis->getNewTauxTvaAttribute();
        } else {
            return $this->taux_tva >= 0 ? $this->taux_tva : $this->autre_taux_tva;
        }
    }
    public function getTypeService()
    {
        if ($this->devis_id) {
            return $this->devis->GetTypeDeServiceAttribute();
        } else {
            return $this->type_service_validation !== "autre" ? $this->type_service_validation : $this->autre_type_service;
        }
    }
    public function getClientName()
    {
        if ($this->devis_id) {
            return $this->devis->appointment->client->nom_complet;
        } else {
            return $this->client_name;
        }
    }
    public function getRemiseFinale()
    {
        if ($this->devis_id) {
            return $this->devis->getRemiseFinalAttrinute();
        } else {
            return $this->remise;
        }
    }
    public function getMantantHt()
    {
        if ($this->devis_id) {
            return $this->devis->getMantantHTFinalAttrinute();
        } else {
            return $this->getPrixHTInitial() - $this->getRemiseFinale();
        }
    }
    public function getTotalTva()
    {
        if ($this->devis_id) {
            return $this->devis->getMantantTvaAttribute();
        } else {
            return ($this->getMantantHt() * $this->getTauxTva()) / 100;
        }
    }
    public function getMantantTTC()
    {
        if ($this->devis_id) {
            return $this->devis->getMantantTtcAttribute();
        } else {
            return $this->getMantantHt() + $this->getTotalTva();
        }
    }
    public function getFacturePayementStatus()
    {
        if ($this->status === 1) {
            return "payeé";
        }
        if ($this->status === 2) {
            return "on cours";
        }
        if ($this->status === 3) {
            return "non payeé";
        }
    }
}
