<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Kendaraan') }}
            </h2>
            <div class="space-x-2">
                <a href="{{ route('kendaraan.index') }}"
                    class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition duration-150 mr-4">
                    &larr; Kembali ke Daftar
                </a>
                <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Edit') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Vehicle Image Placeholder/Icon -->
                        <div class="md:col-span-1">
                            <div
                                class="bg-gray-100 dark:bg-gray-700 rounded-lg aspect-square flex items-center justify-center">
                                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                </svg>
                            </div>
                            <div class="mt-4">
                                <span
                                    class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase tracking-widest">
                                    {{ $kendaraan->status ?? 'Available' }}
                                </span>
                            </div>
                        </div>

                        <!-- Vehicle Details -->
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $kendaraan->title }}
                                </h3>
                                <p class="text-xl text-gray-500 dark:text-gray-400">{{ $kendaraan->brand }}
                                    {{ $kendaraan->model }} ({{ $kendaraan->year }})</p>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase font-bold">Plat Nomor
                                    </p>
                                    <p class="text-lg font-semibold">{{ $kendaraan->plate_number }}</p>
                                </div>
                                <div
                                    class="bg-indigo-50 dark:bg-indigo-900 p-4 rounded-lg border border-indigo-100 dark:border-indigo-800">
                                    <p class="text-sm text-indigo-500 dark:text-indigo-400 uppercase font-bold">Harga
                                        Sewa</p>
                                    <p class="text-2xl font-bold text-indigo-700 dark:text-indigo-300">Rp
                                        {{ number_format($kendaraan->rental_price, 0, ',', '.') }} <span
                                            class="text-sm font-normal">/ hari</span></p>
                                </div>
                            </div>

                            <div>
                                <h4 class="text-lg font-bold mb-2 border-b border-gray-100 dark:border-gray-700 pb-1">
                                    Deskripsi</h4>
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                    {{ $kendaraan->description ?: 'Tidak ada deskripsi untuk kendaraan ini.' }}
                                </p>
                            </div>

                            <div class="pt-6">
                                <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 hover:text-red-900 font-medium"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">
                                        Hapus Kendaraan Ini
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
