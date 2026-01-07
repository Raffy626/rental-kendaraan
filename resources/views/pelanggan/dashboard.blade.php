<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard pelanggan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($kendaraan as $item)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $item->brand }} - {{ $item->model }}
                                ({{ $item->year }})</p>
                            <p class="text-indigo-600 font-semibold mt-2">Rp
                                {{ number_format($item->rental_price, 0, ',', '.') }} / hari</p>
                        </div>

                        <form action="{{ route('rental.store', $item->id) }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Sewa</label>
                                <input type="date" name="rental_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                    Kembali</label>
                                <input type="date" name="return_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>

                            <button type="submit"
                                class="w-full inline-flex justify-center items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Sewa Sekarang
                            </button>
                        </form>
                    </div>
                @empty
                    <div
                        class="col-span-full bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center text-gray-500">
                        Tidak ada kendaraan yang tersedia saat ini.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
