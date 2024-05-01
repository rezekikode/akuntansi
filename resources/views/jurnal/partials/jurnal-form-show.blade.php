<div class="mb-4">
    <x-input-label for="jenis_jurnal_id" :value="__('Jenis Jurnal')" />
    <x-value :value="$jurnal->jenisJurnal->nama" />
</div>
<div class="mb-4">
    <x-input-label for="tanggal" :value="__('Tanggal')" />
    <x-value :value="App\Helpers\Waktu::namaTanggal($jurnal->tanggal)" />
</div>
<div class="mb-4">
    <x-input-label for="keterangan" :value="__('Keterangan')" />
    <x-value :value="$jurnal->keterangan" />
</div>
<div class="mb-4">       
    <x-input-label for="status" :value="__('Status')" />
    <x-value :value="$jurnal->status" />        
</div>