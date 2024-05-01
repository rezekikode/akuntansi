<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lihat Jurnal') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <div class="mt-2">
            <a href="{{ route('jurnal.index') }}"><x-secondary-button>{{ __('Kembali') }}</x-primary-button></a>
        </div>
        <div class="mt-2 px-2 py-2 bg-white shadow"> 
            @include('jurnal.partials.jurnal-form-show')            
        </div>         
        <div class="mt-2 px-2 py-2 bg-white shadow"> 
            @include('jurnal.partials.jurnal-detail-index-show')
        </div>        
        @include('jurnal.partials.jurnal-detail-summary')
    </div>
</x-app-layout>