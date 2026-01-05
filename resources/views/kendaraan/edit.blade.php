<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <form action="{{ route('kendaraan.update') }}" method="POST">
            @csrf
            @method('PUT')

            <input name="title" value="{{ $kendaraan->title }}">
            <input name="plate_number" value="{{ $kendaraan->plate_number }}">
            <input name="brand" value="{{ $kendaraan->brand }}">
            <input name="model" value="{{ $kendaraan->model }}">
            <input name="year" value="{{ $kendaraan->year }}">
            <input name="rental_price" value="{{ $kendaraan->rental_price }}">
            <textarea name="description">{{ $kendaraan->description }}</textarea>

            <button>Update</button>
        </form>
    </x-slot>
</x-app-layout>
