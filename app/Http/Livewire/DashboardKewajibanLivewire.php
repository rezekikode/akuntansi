<?php

namespace App\Http\Livewire;

use App\Models\Akun;
use App\Models\AkunBukuBesar;
use Livewire\Component;

class DashboardKewajibanLivewire extends Component
{
    public $total = 0;
    
    public function total()
    {
        $akun = AkunBukuBesar::find(Akun::AKUN_KEWAJIBAN);
        $this->total = $akun->saldo();
    }

    public function render()
    {
        return view('livewire.dashboard-kewajiban-livewire');
    }
}
