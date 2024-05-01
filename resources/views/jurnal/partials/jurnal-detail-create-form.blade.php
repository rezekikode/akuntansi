<p class="text-gray-500 mb-4">Gunakan form ini untuk menambahkan detil jurnal umum.</p>
<form id="form-create" action="{{ route('jurnal-detail.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <x-text-hidden-input id="jurnal_id" name="jurnal_id" :value="$jurnal->id" />
        <x-input-error :messages="$errors->get('jurnal_id')" class="mt-2" />
    </div>
    <div class="mb-4">                            
        <x-input-label for="akun_id" :value="__('Akun')" />
        <x-select-input2 id="akun_id" class="mt-1 block w-full" name="akun_id" :field-value="old('akun_id')" :options="$akun" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('akun_id') ? ' invalid border-red-500' : ''" />          
        <x-input-error :messages="$errors->get('akun_id')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="debit" :value="__('Debit')" />
        <x-text-input id="debit" name="debit" type="text" class="mt-1 block w-full" :value="old('debit')" :invalid="$errors->get('debit') ? ' invalid border-red-500' : ''" />
        <x-input-error :messages="$errors->get('debit')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="kredit" :value="__('Kredit')" />
        <x-text-input id="kredit" name="kredit" type="text" class="mt-1 block w-full" :value="old('kredit')" :invalid="$errors->get('kredit') ? ' invalid border-red-500' : ''" />
        <x-input-error :messages="$errors->get('kredit')" class="mt-2" />
    </div>
    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Tambah Detail') }}</x-primary-button>
    </div>
</form>