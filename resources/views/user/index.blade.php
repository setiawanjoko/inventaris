<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <x-inventaris.card>
        <livewire:user-table/>
    </x-inventaris.card>
</x-app-layout>
