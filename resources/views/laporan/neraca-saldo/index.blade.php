<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Neraca Saldo') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">       
        <div class="mt-2 bg-white">
            <table class="border-collapse border border-slate-500 table-auto w-full">
                <tr>
                    <th rowspan="2" class="border border-slate-600 text-center px-2">Akun</th>
                    <th colspan="2" class="border border-slate-600 text-center px-2">Saldo Awal</th>
					<th colspan="2" class="border border-slate-600 text-center px-2">Pergerakan</th>                              
                    <th colspan="2" class="border border-slate-600 text-center px-2">Saldo Akhir</th>
                </tr>	
                <tr>  
					<th class="border border-slate-600 text-center px-2">Debit</th>                              
                    <th class="border border-slate-600 text-center px-2">Kredit</th>
                    <th class="border border-slate-600 text-center px-2">Debit</th>                              
                    <th class="border border-slate-600 text-center px-2">Kredit</th>
                    <th class="border border-slate-600 text-center px-2">Debit</th>                              
                    <th class="border border-slate-600 text-center px-2">Kredit</th>
                </tr>
                @foreach ($akuns as $akun)
                @php
                $akun->saldoDebitSebelum();
                $akun->saldoKreditSebelum();
                $akun->totalDebitAnakSekarang();
                $akun->totalKreditAnakSekarang();
                $akun->saldoDebit();
                $akun->saldoKredit();
                @endphp
                <tr>
                    <td class="border border-slate-600 text-left px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ $akun->id }} - {{ $akun->nama }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ number_format($akun->saldo_debit_sebelum, 2) }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }} {{ $akun->akun_id == 0 ? 'font-bold' : '' }}">{{ number_format($akun->saldo_kredit_sebelum, 2) }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ number_format($akun->total_debit_anak_sekarang, 2) }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ number_format($akun->total_kredit_anak_sekarang, 2) }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ number_format($akun->saldo_debit, 2) }}</td>
                    <td class="border border-slate-600 text-right px-2 {{ $akun->akunAnak->count() > 0 ? 'bg-gray-300 font-bold' : 'text-sm' }}">{{ number_format($akun->saldo_kredit, 2) }}</td>
                </tr>
                @endforeach		
            </table>
        </div>
    </div>
</x-app-layout>