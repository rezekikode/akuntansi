<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Akun') }} {{ $akun->id }} - {{ $akun->nama }} <livewire:periode-livewire />
        </h2>
    </x-slot>    
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('akun.index', ['induk' => $induk]) }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
            <a href="{{ route('akun.saldo-awal-akun.index', [$akun->id, 'induk' => $induk]) }}"><x-secondary-button>{{ __('Saldo Awal') }}</x-primary-button></a>
        </div>
        <div class="mt-2 px-2 py-2 bg-white">
            <div class="mb-4">
                <x-input-label for="id" :value="__('Akun')" />
                <x-value :value="$akun->id" />
            </div>
            <div class="mb-4">
                <x-input-label for="akun_id" :value="__('Akun Induk')" />
                <x-value :value="$akun->akun->nama ?? ''" />
            </div>
            <div class="mb-4">
                <x-input-label for="jenis_akun_id" :value="__('Jenis Akun')" />
                <x-value :value="$akun->jenisakun->nama" />
            </div>
            <div class="mb-4">
                <x-input-label for="nama" :value="__('Nama')" />                            
                <x-value :value="$akun->nama" />
            </div>    
            <div class="mb-4">
                <x-input-label for="saldo_normal" :value="__('Saldo Normal')" />
                <x-value :value="$akun->saldo_normal" />
            </div>
            <div class="">                            
                <x-input-label for="jenis_laporan" :value="__('Jenis Laporan')" />
                <x-value :value="$akun->jenis_laporan" />
            </div>
        </div>
    </div>
</x-app-layout>