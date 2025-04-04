<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_demande',
        'date_visite',
        'type_besoin',
        'categorie_besoin',
        'nature_service',
        'autre_categorie_besoin',
        'commercial_name',
        'type_cadence',
        'marchandise',
        'autre_type_cadence',
        'origine',
        'autre_origine',
        'autre_type_besoin',
        'detail',
        'client_id',
        'entreprise_name',

    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function devis()
    {
        return $this->hasMany(Devi::class);
    }

    public static function getData()
    {
        $query = self::select("appointments.*")->with('client');

        if (request()->get('name')) {
            $clientname = request()->get('name');
            $query->whereHas('client', function ($q) use ($clientname) {
                $q->where('name', 'like', "%$clientname%");
            });
        }

        return $query->latest()->paginate(10);
    }
}
