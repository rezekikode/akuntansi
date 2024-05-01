<?php

namespace App\Http\Livewire;

use App\Models\Akun;
use App\Models\AkunBukuBesar;
use Livewire\Component;

class DashboardPendapatanLivewire extends Component
{
    public $total = 0;
    
    public function total()
    {
        $akun = AkunBukuBesar::find(Akun::AKUN_PENDAPATAN);
        $this->total = $akun->saldo();
    }

    public function render()
    {
        return view('livewire.dashboard-pendapatan-livewire');
    }
}
