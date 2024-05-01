<?php

namespace App\Policies;

use App\Models\Jurnal;
use App\Models\User;

class JurnalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Jurnal $jurnal)
    {
        return !$jurnal->trashed();
    }

    public function update(User $user, Jurnal $jurnal)
    {
        $can = false;

        if ($jurnal->status === Jurnal::STATUS_BELUM_POSTING) {
            $can = true;
        }

        if ($jurnal->trashed()) {
            $can = false;
        }

        return $can;
    }

    public function delete(User $user, Jurnal $jurnal)
    {
        $can = false;

        if (
            $jurnal->status === Jurnal::STATUS_BELUM_POSTING &&
            $jurnal->jurnalDetail->count() === 0
        ) {
            $can = true;
        }

        if ($jurnal->trashed()) {
            $can = false;
        }

        return $can;
    }

    public function restore(User $user, Jurnal $jurnal)
    {
        $can = false;

        if ($jurnal->trashed()) {
            $can = true;
        }

        return $can;
    }

    public function posting(User $user, Jurnal $jurnal)
    {
        $can = false;

        if (
            $jurnal->status === Jurnal::STATUS_BELUM_POSTING &&              
            $jurnal->totalDebit() > 0 && $jurnal->totalKredit() > 0 &&
            $jurnal->totalDebit() == $jurnal->totalKredit()
        ) {
            $can = true;
        }

        if ($jurnal->trashed()) {
            $can = false;
        }

        return $can;
    }
}
