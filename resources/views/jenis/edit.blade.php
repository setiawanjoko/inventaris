<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jenis') }}
        </h2>
        <a href="{{ route('jenis.index') }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-rose-500 hover:bg-rose-600">Kembali</a>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Sunting Jenis Inventaris</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Ubah informasi mengenai jenis inventaris yang dipilih.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('jenis.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div>
                                <x-label for="code" :value="__('Kode Jenis')" />
                                <div class="mt-1">
                                    <x-input type="text" id="code" placeholder="J01" class="mt-1 block w-full text-sm" value="{{ $data->code }}" disabled="true" readonly="true"/>
                                </div>
                                <x-form-info formName="code">
                                    <span class="font-extrabold">*</span> Kode tidak dapat diubah.
                                </x-form-info>
                            </div>

                            <div>
                                <x-label for="name" :value="__('Nama Jenis')" />
                                <div class="mt-1">
                                    <x-input type="text" name="name" id="name" placeholder="Habis Pakai" class="mt-1 block w-full text-sm" value="{{ $data->name ?? old('name') }}"/>
                                </div>
                                <x-form-info formName="name"/>
                            </div>

                            <div>
                                <x-label for="description" :value="__('Deskripsi')" />
                                <div class="mt-1">
                                    <x-textarea id="description" name="description" rows="3" placeholder="Bahan habis pakai untuk praktikum" class="mt-1 blcok w-full text-sm">{{ $data->description ?? old('description') }}</x-textarea>
                                </div>
                                <x-form-info formName="description">
                                    <span class="font-extrabold">*</span> Deskripsi singkat mengenai jenis inventaris.
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
