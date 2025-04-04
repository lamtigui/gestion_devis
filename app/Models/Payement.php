<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;

    protected $fillable = [
        'facture_id',
        'mode',
        'montant',
        'date_paiement',
        'numero_cheque',
        'numero_remise',
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public static function getData()
    {
        $data = self::select("payements.*");

        return $data->latest()->paginate(10);
    }

}
