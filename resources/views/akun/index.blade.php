<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Akun') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
			@if ($induk)
				<a href="{{ route('akun.index', ['induk' => $induk->akun_id]) }}">
                    <x-secondary-button>{{ __('Kembali') }}</x-secondary-button>
                </a>
                <a href="{{ route('akun.create', ['induk' => $induk->id]) }}">
                    <x-secondary-button>{{ __('Tambah') }}</x-primary-button>
                </a>
            @else						
                <a href="{{ route('akun.create', ['induk' => 0]) }}">
                    <x-secondary-button>{{ __('Tambah') }}</x-primary-button>
                </a>
            @endif
        </div>        
        <div class="mt-2 px-2 py-2 bg-white">
            <table class="table-auto w-full">
                <tr>
                    <th class="text-left px-2">Akun</th>      
                    <th class="text-left px-2">Jenis Akun</th>
					<th class="text-left px-2">Saldo Normal</th>
					<th class="text-left px-2">Jenis Laporan</th> 
                    <th class="text-right px-2">Saldo Awal</th>                                 
                    <th class="text-right px-2">Saldo</th>                  
                    <th class="text-left px-2 w-32">Aksi</th>
                </tr>
				@foreach ($akuns as $akun)
				<tr>
					<td class="text-left px-2">
                        <x-nav-link href="{{ route('akun.index', ['induk' => $akun->id]) }}">
                            {{ $akun->id }} - {{ $akun->nama }} ({{ $akun->akunAnak->count() }})
                        </x-nav-link>
                    </td>
					<td class="text-left px-2">{{ $akun->jenisAkun->nama ?? '' }}</td>
					<td class="text-left px-2">{{ $akun->saldo_normal }}</td>
					<td class="text-left px-2">{{ $akun->jenis_laporan }}</td>					
                    <td class="text-right px-2">{{ number_format($awal = $akun->AkunBukuBesar->totalSaldoAwalAnak(), 2) }}</td>
					<td class="text-right px-2">{{ number_format($saldo = $akun->AkunBukuBesar->saldo(), 2) }}</td>
					<td class="text-left px-2">
                        <div class="flex flex-row gap-1">
                            @if ($akun->trashed())
                                <div class="flex-initial">
                                    <a href="#" class="restore" data-id="{{ $akun->id }}" data-id-induk="{{ $akun->akun_id }}" data-token="{{ csrf_token() }}"><x-primary-button>{{ __('Kembalikan') }}</x-primary-button></a>
                                </div>
                            @else
                                <div class="flex-initial">
                                    <a href="{{ route('akun.show', [$akun, 'induk' => $akun->akun_id]) }}"><x-secondary-button>{{ __('Lihat') }}</x-secondary-button></a>
                                </div>
                                @can('update', $akun)
                                    <div class="flex-initial">
                                        <a href="{{ route('akun.edit', [$akun, 'induk' => $akun->akun_id]) }}"><x-secondary-button>{{ __('Ubah') }}</x-secondary-button></a>
                                    </div>
                                @endcan
                                @can('delete', $akun)
                                    <div class="flex-initial">
                                        <a href="#" class="hapus" data-id="{{ $akun->id }}" data-id-induk="{{ $akun->akun_id }}" data-token="{{ csrf_token() }}"><x-danger-button>{{ __('Hapus') }}</x-danger-button></a>
                                    </div>
                                @endcan
                            @endif
                        </div>
					</td>
				</tr>
                @endforeach
            </table>
        </div>
    </div>    
    @vite(['resources/js/akuntansi/akun/index.js'])
</x-app-layout>