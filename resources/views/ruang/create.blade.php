<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ruang') }}
        </h2>
        <a href="{{ route('ruang.index') }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-500 hover:bg-rose-600">Kembali</a>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah Ruangan</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Masukkan informasi mengenai ruangan baru.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('ruang.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div>
                                <x-label for="code" :value="__('Kode Ruang')" />
                                <div class="mt-1">
                                    <x-input type="text" name="code" id="code" placeholder="R01" class="mt-1 block w-full text-sm" value="{{ old('code') ?? '' }}"/>
                                </div>
                                <x-form-info formName="code">
                                    <span class="font-extrabold">*</span> Kode tidak dapat diubah.
                                </x-form-info>
                            </div>

                            <div>
                                <x-label for="name" :value="__('Nama Ruang')" />
                                <div class="mt-1">
                                    <x-input type="text" name="name" id="name" placeholder="Ruang 1" class="mt-1 block w-full text-sm" value="{{ old('name') ?? '' }}"/>
                                </div>
                                <x-form-info formName="name"/>
                            </div>

                            <div>
                                <x-label for="description" :value="__('Deskripsi')" />
                                <div class="mt-1">
                                    <x-textarea id="description" name="description" rows="3" placeholder="Ruangan Teori 01" class="mt-1 blcok w-full text-sm">{{ old('description' ?? '') }}</x-textarea>
                                </div>
                                <x-form-info formName="description">
                                    <span class="font-extrabold">*</span> Deskripsi singkat mengenai ruangan.
                                </x-form-info>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
