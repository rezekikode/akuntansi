<?php

namespace App\Http\Livewire;

use App\Helpers\Waktu;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PeriodeLivewire extends Component
{

    public $periode;

    public function mount()
    {
        $bulan = Session::get('month');
        $tahun = Session::get('year');
        $this->periode = Waktu::namaBulan($bulan) . ' ' . $tahun;
    }

    public function render()
    {
        return view('livewire.periode-livewire');
    }
}
