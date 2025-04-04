<?php

namespace App\Models;

use App\Enums\ClientType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adresse',
        'email',
        'phone',
        'ville',
        'autre_ville',
        'type_client',
        'entreprise_name',
    ];
    protected $casts = [
        'type_client' => ClientType::class,
    ];
    public static function getData(Request $request)
    {

        $data = self::select("clients.*");

        if ($request->name) {
            $data = $data->where('name', 'like', '%' . $request->get('name') . '%');
        }

        return $data->latest()->paginate(7);
    }

    public function Appointement()
    {
        return $this->hasMany(Appointment::class);
    }

    // public function demandes()
    // {
    //     return $this->hasMany(Demande::class);
    // }
    // public function devises()
    // {
    //     return $this->hasMany(Devise::class);
    // }
    // public function services()
    // {
    //     return $this->hasMany(Service::class);
    // }
    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }
}
