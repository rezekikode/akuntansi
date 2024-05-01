@if ($jurnal->totalDebit() != $jurnal->totalKredit())
    <div class="mt-2 px-2 py-2 bg-white shadow"> 
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Perhatian!</strong>
            <span class="block sm:inline">Total debit dan kredit tidak sama.</span>
        </div>
    </div>
@endif