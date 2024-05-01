<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Saldo Awal Akun') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('akun.saldo-awal-akun.index', [$akun, 'induk' => $induk]) }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
        </div>
        <div class="mt-2 px-2 py-2 bg-white">                
            <form action="{{ route('akun.saldo-awal-akun.store', [$akun, 'induk' => $induk]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-input-label for="id" :value="__('Kode Akun')" />
                    <x-value :value="$akun->id" />
                    <x-text-hidden-input id="akun_id" name="akun_id" :value="$akun->id" />
                    <x-text-hidden-input id="tahun" name="tahun" :value="Session::get('year')" />
                    <x-text-hidden-input id="bulan" name="bulan" :value="Session::get('month')" />
                    <x-text-hidden-input id="tanggal" name="tanggal" :value="Session::get('year').'-'.Session::get('month').'-'.'01'" />
                </div>  
                <div class="mb-4">
                    <x-input-label for="id" :value="__('Nama Akun')" />
                    <x-value :value="$akun->nama" />
                </div>
                <div class="mb-4">
                    <x-input-label for="id" :value="__('Jenis akun')" />
                    <x-value :value="$akun->jenisakun->nama" />
                </div>
                <div class="mb-4">
                    <x-input-label for="id" :value="__('Saldo Normal')" />
                    <x-value :value="$akun->saldo_normal" />
                </div>
                <div class="mb-4">
                    <x-input-label for="debit" :value="__('Saldo Awal Debit')" />
                    <x-text-input id="debit" name="debit" type="text" class="mt-1 block w-full" :value="old('debit')" :invalid="$errors->get('debit') ? ' invalid border-red-500' : ''" />
                    <x-input-error :messages="$errors->get('debit')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="kredit" :value="__('Saldo Awal Kredit')" />
                    <x-text-input id="kredit" name="kredit" type="text" class="mt-1 block w-full" :value="old('kredit')" :invalid="$errors->get('kredit') ? ' invalid border-red-500' : ''" />
                    <x-input-error :messages="$errors->get('kredit')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>