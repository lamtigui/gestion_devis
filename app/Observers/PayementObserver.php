<?php

namespace App\Observers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Payement;

class PayementObserver
{
    /**
     * Handle the Payement "created" event.
     */
    public function created(Payement $payement): void
    {
        $facture = Facture::findOrFail($payement->facture_id);
        //
        $total_to_paye = $facture->getMantantTTC();
        if ($facture->Payement()) {
            $total_payed = $facture->Payement()->sum('montant');
        }
        if ($total_payed === $total_to_paye) {
            $facture->update([
                "status" => 1
            ]);
        } elseif ($total_payed > 0 && $total_payed < $total_to_paye) {
            $facture->update([
                "status" => 2
            ]);
        } else {
            $facture->update([
                "status" => 0
            ]);
        };
    }

    /**
     * Handle the Payement "updated" event.
     */
    public function updated(Payement $payement): void
    {
        $facture = Facture::findOrFail($payement->facture_id);
        $total_to_paye = $facture->getMantantTTC();
        if ($facture->Payement()) {
            $total_payed = $facture->Payement()->sum('montant');
        }

        if ($total_payed === $total_to_paye) {
            $facture->status = 1;
        } elseif ($total_payed > 0 && $total_payed < $total_to_paye) {
            $facture->status = 2;
        } else {
            $facture->status = 3;
        }
        $facture->save();
        if ($payement->mode !== "CHEQUE" && $payement->mode !== "PAR EFFET") {
            $payement->update([
                'numero_cheque' => null,
                'numero_remise' => null,
            ]);
        }
    }

    /**
     * Handle the Payement "deleted" event.
     */
    public function deleted(Payement $payement): void
    {
        $facture = Facture::findOrFail($payement->facture_id);
        //
        $total_to_paye = $facture->getMantantTTC();
        if ($facture->Payement()) {
            $total_payed = $facture->Payement()->sum('montant');
        }
        $message = "total payed is " . $total_payed . " and total to paye is " . $total_to_paye ;
        if ($total_payed === $total_to_paye) {
            $facture->update([
                "status" => 1
            ]);
        } elseif ($total_payed > 0 && $total_payed < $total_to_paye) {
            $facture->update([
                "status" => 2
            ]);
        } else {
            $facture->update([
                "status" => 3
            ]);
        };
    }

    /**
     * Handle the Payement "restored" event.
     */
    public function restored(Payement $payement): void
    {
        //
    }

    /**
     * Handle the Payement "force deleted" event.
     */
    public function forceDeleted(Payement $payement): void
    {
        //
    }
}
