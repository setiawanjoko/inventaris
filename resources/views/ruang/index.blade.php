<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang') }}
        </h2>
        <a href="{{ route('ruang.create') }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-sky-500 hover:bg-sky-600">Tambah</a>
    </x-slot>

    <x-inventaris.card>
        <livewire:ruang-table/>
    </x-inventaris.card>

    <x-inventaris.modal.delete/>
</x-app-layout>
