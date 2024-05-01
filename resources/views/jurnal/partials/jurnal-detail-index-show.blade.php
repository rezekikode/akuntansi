<table class="table-auto w-full border-collapse border border-slate-500">
    <thead class="bg-gray-300">
        <tr>
            <th class="text-left px-2 border border-slate-600">Akun</th>            
            <th class="text-right px-2 border border-slate-600">Debit</th>
            <th class="text-right px-2 border border-slate-600">Kredit</th>     
        </tr>
    </thead>
    <tbody>
        @if ($jurnal->jurnalDetail->count() > 0)
            @foreach ($jurnal->jurnalDetail as $data)
                <tr>
                    <td class="text-left px-2 border border-slate-600">{{ $data->akun_id }} - {{ $data->akun->nama }}</td>
                    <td class="text-right px-2 border border-slate-600">{{ number_format($data->debit, 2) }}</td>
                    <td class="text-right px-2 border border-slate-600">{{ number_format($data->kredit, 2) }}</td>                    
                </tr>
            @endforeach            
        @else
            <tr>
                <td colspan="3" class="text-left px-2">Tidak ada data.</td>
            </tr>
        @endif
    </tbody>
    <tfoot class="bg-gray-100">
        <tr>
            <td class="text-left px-2">Total</td>
            <td class="text-right px-2">{{ number_format($jurnal->totalDebit(), 2) }}</td>
            <td class="text-right px-2">{{ number_format($jurnal->totalKredit(), 2) }}</td>
        </tr>
    </tfoot>
</table>