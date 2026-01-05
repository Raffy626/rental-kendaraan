<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create') }}
        </h2>
        <form action="{{ route('kendaraan.store') }} " method="POST">
            @csrf
            <input name="title" placeholder="Nama Kendaraan">
            <input name="plate_number" placeholder="Plat Nomor">
            <input name="brand" placeholder="Brand">
            <input name="model" placeholder="Model">
            <input name="year" placeholder="Tahun">
            <input name="rental_price" placeholder="Harga Sewa">
            <textarea name="description"></textarea>
            <button>Simpan</button>
        </form>
    </x-slot>
</x-app-layout>
