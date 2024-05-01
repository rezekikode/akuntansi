<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} <livewire:periode-livewire />
        </h2>
    </x-slot>
    <div class="px-2">
        <!-- <div class="mt-2 px-2 py-2 bg-white">    
            <div class="text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div> -->
        <div class="mt-2">                
            <livewire:dashboard-modal-livewire />
        </div>
        <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <div>                
                <livewire:dashboard-aset-livewire />
            </div>
            <div>
                <livewire:dashboard-kewajiban-livewire />
            </div>
            <div>
                <livewire:dashboard-pendapatan-livewire />
            </div>
            <div>
                <livewire:dashboard-beban-livewire />
            </div>
        </div>
    </div>
</x-app-layout>
