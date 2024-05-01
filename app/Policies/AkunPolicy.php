<?php

namespace App\Policies;

use App\Models\Akun;
use App\Models\User;

class AkunPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Akun $akun)
    {
        $can = false;

        if ($akun->AkunBukuBesar->saldo() === 0) {
            $can = true;
        }

        return $can;
    }

    public function delete(User $user, Akun $akun)
    {
        $can = false;

        if ($akun->akunAnak->count() == 0 && $akun->AkunBukuBesar->saldo() === 0) {
            $can = true;
        }

        return $can;
    }
}
