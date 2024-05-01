<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jurnal') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('jurnal.create') }}"><x-secondary-button>{{ __('Tambah') }}</x-primary-button></a>        
        </div>
        <div class="mt-2 px-2 py-2 bg-white">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-left px-2">Id Jurnal</th>
                        <th class="text-left px-2">Jenis Jurnal</th>
                        <th class="text-left px-2">Tanggal</th>
                        <th class="text-left px-2">Keterangan</th>
                        <th class="text-right px-2">Debit</th>
                        <th class="text-right px-2">Kredit</th>
                        <th class="text-left px-2">Status</th>
                        <th class="text-left px-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurnals as $jurnal)
                    <tr class="{{ $jurnal->totalDebit() != $jurnal->totalKredit() ? 'bg-red-100 border border-red-400' : '' }}">
                        <td class="text-left px-2">{{ $jurnal->id }}</td>
                        <td class="text-left px-2">{{ $jurnal->jenisJurnal->nama }}</td>
                        <td class="text-left px-2">{{ App\Helpers\Waktu::namaTanggal($jurnal->tanggal) }}</td>
                        <td class="text-left px-2">{{ $jurnal->keterangan }}</td>
                        <td class="text-right px-2">{{ number_format($jurnal->totalDebit(), 2) }}</td>
                        <td class="text-right px-2">{{ number_format($jurnal->totalKredit(), 2) }}</td>
                        <td class="text-left px-2">{{ $jurnal->status }}</td>
                        <td class="text-left px-2 w-32">                            
                            <div class="flex flex-row gap-1">                                  
                                @can('show', $jurnal)      
                                <div class="flex-initial">
                                    <a href="{{ route('jurnal.show', $jurnal->id) }}"><x-secondary-button>{{ __('Lihat') }}</x-secondary-button></a>
                                </div>  
                                @endcan                 
                                @can('update', $jurnal)                                 
                                <div class="flex-initial">
                                    <a href="{{ route('jurnal.edit', $jurnal->id) }}"><x-secondary-button>{{ __('Ubah') }}</x-secondary-button></a>
                                </div>
                                @endcan
                                @can('delete', $jurnal)
                                    <div class="flex-initial">
                                        <a href="#" class="hapus" data-id="{{ $jurnal->id }}" data-token="{{ csrf_token() }}"><x-danger-button>{{ __('Hapus') }}</x-danger-button></a>
                                    </div>
                                @endcan
                                @can('posting', $jurnal)
                                    <div class="flex-initial">
                                        <div class="flex-initial">
                                            <a href="#" class="posting" data-id="{{ $jurnal->id }}" data-token="{{ csrf_token() }}"><x-primary-button>{{ __('Posting') }}</x-danger-button></a>
                                        </div>
                                    </div>
                                @endcan
                                @can('restore', $jurnal)     
                                <div class="flex-initial">
                                    <a href="#" class="restore" data-id="{{ $jurnal->id }}" data-id-induk="{{ $jurnal->akun_id }}" data-token="{{ csrf_token() }}"><x-primary-button>{{ __('Kembalikan') }}</x-primary-button></a>
                                </div>
                                @endcan 
                            </div>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @vite(['resources/js/akuntansi/jurnal/index.js'])
</x-app-layout>