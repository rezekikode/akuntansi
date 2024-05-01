<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Buku Besar') }} <livewire:periode-livewire />
        </h2>
    </x-slot>    
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('laporan.buku-besar.index', ['induk' => $induk]) }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
        </div>
        <div class="mt-2 border-collapse border border-slate-500 bg-white">
            <table class="table-auto w-full text-sm">
                <caption class="mb-4 text-lg">
                    <h1>Buku Besar</h1>
                    <p class="text-sm"><livewire:periode-livewire /></p> 
                </caption>
                <tr>
                    <td class="px-2 w-1">Akun</td>
                    <td class="px-2">: {{ $akun->id }}</td>
                </tr>
                <tr>
                    <td class="px-2 w-1">Nama</td>
                    <td class="px-2">: {{ $akun->nama }}</td>
            </table>
        </div>
        <div class="mt-2 bg-white">            
            <table class="border-collapse border border-slate-500 table-auto w-full text-sm">
                <tr>
                    <th class="border border-slate-600 text-center px-2" rowspan="2">Tanggal</th>
                    <th class="border border-slate-600 text-center px-2" rowspan="2">Keterangan</th>    
                    <th class="border border-slate-600 text-center px-2" rowspan="2">Debit</th>
					<th class="border border-slate-600 text-center px-2" rowspan="2">Kredit</th>
                    <th class="border border-slate-600 text-center px-2" colspan="2">Saldo</th>
                </tr>
                <tr>
                    <th class="border border-slate-600 text-center px-2">Debit</th>
                    <th class="border border-slate-600 text-center px-2">Kredit</th>
                </tr>
				@foreach ($bukuBesars as $bukuBesar)
                @php
                $saldoDebit = $bukuBesar->saldoDebit();
                $saldoKredit = $bukuBesar->saldoKredit();
                @endphp
				<tr>
					<td class="border border-slate-600 text-left px-2">{{ App\Helpers\Waktu::namaTanggal($bukuBesar->tanggal) }}</td>
					<td class="border border-slate-600 text-left px-2">{{ $bukuBesar->jurnal->keterangan }}</td>
					<td class="border border-slate-600 text-right px-2">{{ $bukuBesar->debit > 0 ?  number_format($bukuBesar->debit, 2) : '-' }}</td>
					<td class="border border-slate-600 text-right px-2">{{ $bukuBesar->kredit > 0 ?  number_format($bukuBesar->kredit, 2) : '-' }}</td>
                    <td class="border border-slate-600 text-right px-2">{{ $saldoDebit > 0 ?  number_format($saldoDebit, 2) : '-' }}</td>
                    <td class="border border-slate-600 text-right px-2">{{ $saldoKredit > 0 ?  number_format($saldoKredit, 2) : '-' }}</td>					
				</tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>