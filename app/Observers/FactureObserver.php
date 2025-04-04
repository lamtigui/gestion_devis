<?php

namespace App\Observers;

use App\Models\Facture;
use Illuminate\Support\Facades\Auth;

class FactureObserver
{
    /**
     * Handle the Facture "created" event.
     */
    public function creating(Facture $facture): void
    {
        $facture->admin_id = Auth::user()->id;
    }
    public function created(Facture $facture): void
    {
        //
    }

    /**
     * Handle the Facture "updated" event.
     */
    public function updated(Facture $facture): void
    {
        //
    }

    /**
     * Handle the Facture "deleted" event.
     */
    public function deleted(Facture $facture): void
    {
        //
    }

    /**
     * Handle the Facture "restored" event.
     */
    public function restored(Facture $facture): void
    {
        //
    }

    /**
     * Handle the Facture "force deleted" event.
     */
    public function forceDeleted(Facture $facture): void
    {
        //
    }
}
