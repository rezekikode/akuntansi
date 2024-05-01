<form action="{{ route('jurnal.update', $jurnal->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <x-input-label for="jenis_jurnal_id" :value="__('Jenis Jurnal')" />
        <x-select-input2 id="jenis_jurnal_id" class="mt-1 block w-full" name="jenis_jurnal_id" :field-value="$jurnal->jenis_jurnal_id" :options="$jenisJurnal" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('jenis_jurnal_id') ? ' invalid border-red-500' : ''" :disabled="$jurnal->status == \App\Models\Jurnal::STATUS_SUDAH_POSTING" />                            
        <x-input-error :messages="$errors->get('jenis_jurnal_id')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="tanggal" :value="__('Tanggal')" />
        <x-text-input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full" :value="$jurnal->tanggal" :disabled="$jurnal->status == \App\Models\Jurnal::STATUS_SUDAH_POSTING" />
        <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="keterangan" :value="__('Keterangan')" />
        <x-text-input id="keterangan" name="keterangan" type="text" class="mt-1 block w-full" :value="$jurnal->keterangan" :disabled="$jurnal->status == \App\Models\Jurnal::STATUS_SUDAH_POSTING" />
        <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
    </div>
    <div class="mb-4">
        @php
        if (
            $jurnal->totalDebit() > 0 && $jurnal->totalKredit() > 0 && 
            $jurnal->totalDebit() == $jurnal->totalKredit()
        )
            $status = [
                (object) ['id' => \App\Models\Jurnal::STATUS_BELUM_POSTING, 'nama' => \App\Models\Jurnal::STATUS_BELUM_POSTING],
                (object) ['id' => \App\Models\Jurnal::STATUS_SUDAH_POSTING, 'nama' => \App\Models\Jurnal::STATUS_SUDAH_POSTING],
            ];
        else
            $status = [
                (object) ['id' => \App\Models\Jurnal::STATUS_BELUM_POSTING, 'nama' => \App\Models\Jurnal::STATUS_BELUM_POSTING],
            ];
        @endphp
        <x-input-label for="status" :value="__('Status')" />
        <x-select-input id="status" class="mt-1 block w-full" name="status" :field-value="$jurnal->status" :options="$status" :option-value="'id'" :option-label="'nama'" :disabled="$jurnal->status == \App\Models\Jurnal::STATUS_SUDAH_POSTING" />
        <div class="bg-green-100 mt-2 p-4 text-sm text-gray-500">
            <ul>
                <li> Status Sudah Posting akan muncul setelah total debit dan kredit sama dan tidak nol.</li>
                <li> 
                    Untuk melakukan posting jurnal umum ke buku besar, ubah status menjadi sudah posting.
                    Setelah posting, jurnal umum tidak dapat diubah.
                </li>                
            </ul>
            <br>
            <i class="bg-red-500 text-white text-xs rounded p-1 p">Pastikan jurnal umum sudah benar sebelum diposting.</i>
        </div>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />        
    </div>
    @if ($jurnal->status == \App\Models\Jurnal::STATUS_BELUM_POSTING)
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Simpan') }}</x-primary-button>
    </div>
    @endif
</form>