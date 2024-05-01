<table class="table-auto w-full border-collapse border border-slate-500">
    <thead class="bg-gray-300">
        <tr>
            <th class="text-left px-2 border border-slate-600">Akun</th>            
            <th class="text-right px-2 border border-slate-600">Debit</th>
            <th class="text-right px-2 border border-slate-600">Kredit</th>
            <th class="text-left px-2 border border-slate-600 w-32">Aksi</th>       
        </tr>
    </thead>
    <tbody>
        @if ($jurnal->jurnalDetail->count() > 0)
            @foreach ($jurnal->jurnalDetail as $data)
                <tr>
                    <td class="text-left px-2 border border-slate-600">{{ $data->akun_id }} - {{ $data->akun->nama }}</td>
                    <td class="text-right px-2 border border-slate-600">{{ number_format($data->debit, 2) }}</td>
                    <td class="text-right px-2 border border-slate-600">{{ number_format($data->kredit, 2) }}</td>
                    <td class="text-left px-2 border border-slate-600">   
                        @if ($data->jurnal->status == \App\Models\Jurnal::STATUS_BELUM_POSTING)
                        <div class="flex flex-row gap-1">
                            <div class="flex-initial">
                                <a href="{{ route('jurnal.edit', [$data->jurnal_id, 'idDetail' => $data->id]) }}#form-edit"><x-secondary-button>{{ __('Ubah') }}</x-secondary-button>
                            </div>
                            <div class="flex-initial">                                
                                <form action="{{ route('jurnal-detail.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                        
                                    <x-danger-button>{{ __('Hapus') }}</x-danger-button>
                                </form>                               
                            </div>
                        </div>     
                        @endif                
                    </td>
                </tr>
            @endforeach            
        @else
            <tr>
                <td colspan="4" class="text-left px-2">Tidak ada data.</td>
            </tr>
        @endif
    </tbody>
    <tfoot class="bg-gray-100">
        <tr>
            <td class="text-left px-2">Total</td>
            <td class="text-right px-2">{{ number_format($jurnal->totalDebit(), 2) }}</td>
            <td class="text-right px-2">{{ number_format($jurnal->totalKredit(), 2) }}</td>
            <td></td>
        </tr>
    </tfoot>
</table>