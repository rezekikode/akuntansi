<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jurnal') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('jurnal.index') }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
        </div>
        <div class="mt-2 px-2 py-2 bg-white">             
            <form action="{{ route('jurnal.store') }}" method="POST">
                @csrf
                <div class="mb-4">                            
                    <x-input-label for="jenis_jurnal_id" :value="__('Jenis Jurnal')" />
                    <x-select-input2 id="jenis_jurnal_id" class="mt-1 block w-full" name="jenis_jurnal_id" :field-value="old('jenis_jurnal_id')" :options="$jenisJurnal" :option-value="'id'" :option-label="'nama'" :invalid="$errors->get('jenis_jurnal_id') ? ' invalid border-red-500' : ''" />                            
                    <x-input-error :messages="$errors->get('jenis_jurnal_id')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="tanggal" :value="__('Tanggal')" />
                    <x-text-input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full" :value="old('tanggal') ?? now()->format('Y-m-d')" />
                    <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="keterangan" :value="__('Keterangan')" />
                    <x-text-input id="keterangan" name="keterangan" type="text" class="mt-1 block w-full" :value="old('keterangan')" />
                    <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                </div>
                <div class="mb-4">
                    @php
                    $status = [
                        (object) ['id' => 'Belum Posting', 'nama' => 'Belum Posting'],
                        (object) ['id' => 'Sudah Posting', 'nama' => 'Sudah Posting'],
                    ];
                    @endphp
                    <x-input-label for="status" :value="__('Status')" />
                    <x-select-input id="status" class="mt-1 block w-full" name="status" :field-value="'Belum Posting'" :options="$status" :option-value="'id'" :option-label="'nama'" />          
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                </div>
            </form>
        </div>        
    </div>
</x-app-layout>