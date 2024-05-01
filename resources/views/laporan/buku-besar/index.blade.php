<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Buku Besar') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">       
        <div class="mt-2 px-2 py-2 bg-white">
            <table class="table-auto w-full">
                <tr>
                    <th class="text-left px-2">Akun</th>  
                    <th class="text-left px-2">Jenis Akun</th>
					<th class="text-left px-2">Saldo Normal</th>
					<th class="text-left px-2">Jenis Laporan</th>                                
                    <th class="text-right px-2">Saldo</th>                  
                    <th class="text-left px-2 w-32">Aksi</th>
                </tr>
				@foreach ($akunBukuBesar as $akun)                
				<tr>
					<td class="text-left px-2">{{ $akun->id }} - {{ $akun->nama }}</td>
					<td class="text-left px-2">{{ $akun->jenisAkun->nama ?? '' }}</td>
					<td class="text-left px-2">{{ $akun->saldo_normal }}</td>
					<td class="text-left px-2">{{ $akun->jenis_laporan }}</td>					
					<td class="text-right px-2">{{ number_format($akun->saldo(), 2) }}</td>
					<td class="text-left px-2">
                        <div class="flex flex-row gap-1">
                            <div class="flex-initial">
                                <a href="{{ route('laporan.buku-besar.show', $akun->id) }}"><x-secondary-button>{{ __('Lihat') }}</x-secondary-button></a>
                            </div>                            
                        </div>
					</td>
				</tr>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>