<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Saldo Awal Akun') }} {{ $akun->id }} - {{ $akun->nama }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
			@if ($akun)
				<a href="{{ route('akun.show', [$akun, 'induk' => $akun->akun_id]) }}">
                    <x-secondary-button>{{ __('Kembali') }}</x-secondary-button>
                </a>
                <a href="{{ route('akun.saldo-awal-akun.create', [$akun, 'induk' => $akun->akun_id]) }}">
                    <x-secondary-button>{{ __('Tambah') }}</x-primary-button>
                </a>
			@endif            
        </div>        
        <div class="mt-2 px-2 py-2 bg-white">
            <table class="table-auto w-full">
                <tr>
                    <th class="text-left px-2">Akun</th>
                    <th class="text-left px-2">Tanggal</th>                        
                    <th class="text-left px-2">Debit</th>
                    <th class="text-left px-2">Kredit</th>
                    <th class="text-left px-2 w-32">Aksi</th>
                </tr>
				@foreach ($akunSaldoAwals as $akunSaldoAwal)
				<tr>    
                    <td class="text-left px-2">{{ $akunSaldoAwal->akun->id }} - {{ $akunSaldoAwal->akun->nama }}</td>
                    <td class="text-left px-2">{{ App\Helpers\Waktu::namaTanggal($akunSaldoAwal->tanggal) }}</td>
                    <td class="text-left px-2">{{ $akunSaldoAwal->debit }}</td>
                    <td class="text-left px-2">{{ $akunSaldoAwal->kredit }}</td>
					<td class="text-left px-2">
                        <div class="flex flex-row gap-1">
                            
                        </div>
					</td>
				</tr>
                @endforeach
            </table>
        </div>
    </div>    
</x-app-layout>