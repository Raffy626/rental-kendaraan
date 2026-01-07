<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Rental Berjalan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($rentals as $rental)
                        @if ($rental->rental_status === 'ongoing')
                            <div class="border dark:border-gray-700 rounded-xl p-5 bg-gray-50 dark:bg-gray-900 shadow-sm hover:shadow-md transition">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                                            {{ $rental->kendaraan->title }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Penyewa: <span class="font-medium text-gray-700 dark:text-gray-300">{{ $rental->user->name }}</span>
                                        </p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full uppercase">
                                        {{ $rental->rental_status }}
                                    </span>
                                </div>

                                <div class="mb-5">
                                    <p class="text-xs text-gray-400 uppercase tracking-wider">Batas Pengembalian</p>
                                    <p class="text-sm font-semibold text-red-500">
                                        {{ \Carbon\Carbon::parse($rental->return_date)->format('d M Y, H:i') }}
                                    </p>
                                </div>

                                <form action="{{ route('rental.return', $rental->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" 
                                        onclick="return confirm('Apakah kendaraan sudah kembali dengan baik?')"
                                        class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="9 5l7 7-7 7" />
                                        </svg>
                                        Kembalikan
                                    </button>
                                </form>
                            </div>
                        @endif
                    @empty
                        <div class="col-span-full text-center py-10">
                            <p class="text-gray-500 dark:text-gray-400 italic">Tidak ada rental yang sedang berjalan.</p>
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>