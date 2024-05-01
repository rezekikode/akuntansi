<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Akun') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('akun.index', ['induk' => $induk]) }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
        </div>
        <div class="mt-2 px-2 py-2 bg-white">                
            <form action="{{ route('akun.store', ['induk' => $induk]) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-input-label for="id" :value="__('Kode Akun')" />
                    <x-text-input id="id" name="id" type="text" class="mt-1 block w-full" :value="old('id')" :invalid="$errors->get('id') ? ' invalid border-red-500' : ''" />
                    <x-input-error :messages="$errors->get('id')" class="mt-2" />
                </div>
                <div class="mb-4">                            
                    <x-input-label for="akun_id" :value="__('Kode Akun Induk')" />
                    <x-select-input2 id="akun_id" class="mt-1 block w-full" name="akun_id" :field-value="old('akun_id') ?? $induk" :options="$akunInduk" :option-value="'id'" :option-label="'nama'" />          
                    <x-input-error :messages="$errors->get('akun_id')" class="mt-2" />
                </div>
                <div class="mb-4">                            
                    <x-input-label for="jenis_akun_id" :value="__('Jenis Akun')" />
                    <x-select-input2 id="jenis_akun_id" class="mt-1 block w-full" name="jenis_akun_id" :field-value="old('jenis_akun_id')" :options="$jenisAkun" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('jenis_akun_id') ? ' invalid border-red-500' : ''" />                            
                    <x-input-error :messages="$errors->get('jenis_akun_id')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="nama" :value="__('Nama')" />                            
                    <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" :value="old('nama')" :invalid="$errors->get('nama') ? ' invalid border-red-500' : ''" />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>    
                <div class="mb-4">
                    @php
                    $saldoNormal = [
                        (object) ['id' => \App\Models\Akun::SALDO_NORMAL_DEBIT, 'nama' => \App\Models\Akun::SALDO_NORMAL_DEBIT],
                        (object) ['id' => \App\Models\Akun::SALDO_NORMAL_KREDIT, 'nama' => \App\Models\Akun::SALDO_NORMAL_KREDIT],
                    ];
                    @endphp
                    <x-input-label for="saldo_normal" :value="__('Saldo Normal')" />
                    <x-select-input id="saldo_normal" class="mt-1 block w-full" name="saldo_normal" :field-value="old('saldo_normal')" :options="$saldoNormal" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('saldo_normal') ? ' invalid border-red-500' : ''" />
                    <x-input-error :messages="$errors->get('saldo_normal')" class="mt-2" />
                </div>
                <div class="mb-4">                            
                    @php
                    $jenisLaporan = [
                        (object) ['id' => \App\Models\Akun::JENIS_LAPORAN_LABA_RUGI, 'nama' => \App\Models\Akun::JENIS_LAPORAN_LABA_RUGI],
                        (object) ['id' => \App\Models\Akun::JENIS_LAPORAN_NERACA, 'nama' => \App\Models\Akun::JENIS_LAPORAN_NERACA],
                    ];
                    @endphp
                    <x-input-label for="jenis_laporan" :value="__('Jenis Laporan')" />
                    <x-select-input id="jenis_laporan" class="mt-1 block w-full" name="jenis_laporan" :field-value="old('jenis_laporan')" :options="$jenisLaporan" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('jenis_laporan') ? ' invalid border-red-500' : ''" />          
                    <x-input-error :messages="$errors->get('jenis_laporan')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>