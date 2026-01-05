<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah Kendaraan Baru') }}
            </h2>
            <a href="{{ route('kendaraan.index') }}"
                class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition duration-150">
                &larr; Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('kendaraan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div class="col-span-2">
                                <label for="title"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                    Kendaraan</label>
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    placeholder="Contoh: Toyota Avanza Silver"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Plate Number -->
                            <div>
                                <label for="plate_number"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Plat
                                    Nomor</label>
                                <input type="text" name="plate_number" id="plate_number"
                                    value="{{ old('plate_number') }}" placeholder="B 1234 ABC"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('plate_number')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Year -->
                            <div>
                                <label for="year"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tahun</label>
                                <input type="number" name="year" id="year" value="{{ old('year') }}"
                                    placeholder="2023"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('year')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Brand -->
                            <div>
                                <label for="brand"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Brand</label>
                                <input type="text" name="brand" id="brand" value="{{ old('brand') }}"
                                    placeholder="Toyota"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('brand')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Model -->
                            <div>
                                <label for="model"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                                <input type="text" name="model" id="model" value="{{ old('model') }}"
                                    placeholder="Avanza"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @error('model')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Rental Price -->
                            <div>
                                <label for="rental_price"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Harga Sewa (Per
                                    Hari)</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="rental_price" id="rental_price"
                                        value="{{ old('rental_price') }}" placeholder="500000"
                                        class="block w-full pl-10 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                </div>
                                @error('rental_price')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-span-2">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                <textarea name="description" id="description" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end pt-6 border-t border-gray-100 dark:border-gray-700">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Simpan Kendaraan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
