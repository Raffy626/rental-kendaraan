<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kendaraan') }}
        </h2>
        <a href="{{ route('kendaraan.create') }}">Tambah kendaraan</a>

        @foreach ( $kendaraan as $item )
            <p>
                {{ $item->title }} - {{ $item->plate_number }}
                <a href="{{ route('kendaraan.edit', $item->id) }}">Edit</a>

                <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Hapus</button>
                </form>
            </p>
        @endforeach
    </x-slot>
</x-app-layout>
