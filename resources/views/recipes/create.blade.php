@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto px-4">

    <a href="{{ route('recipes.index') }}"
       class="text-orange-600 mb-4 inline-block font-semibold hover:underline">
        ← Kembali ke Dashboard
    </a>

    <div class="bg-white p-8 rounded-xl shadow border border-orange-100">
        <h2 class="text-2xl font-bold mb-6 text-orange-900">
            Tambah Resep Baru
        </h2>

        {{-- GLOBAL ERROR --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recipes.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-4">
            @csrf

            {{-- JUDUL --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Judul Resep
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-orange-200"
                       required>
            </div>

            {{-- FOTO --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Foto Masakan
                </label>
                <input type="file"
                       name="image"
                       class="w-full p-2 border rounded"
                       accept="image/jpeg,image/png,image/jpg,image/webp">
                @error('image')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- KATEGORI --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Kategori
                </label>
                <select name="category"
                        class="w-full p-2 border rounded">
                    <option value="Makanan Utama"
                        {{ old('category') == 'Makanan Utama' ? 'selected' : '' }}>
                        Makanan Utama
                    </option>
                    <option value="Camilan"
                        {{ old('category') == 'Camilan' ? 'selected' : '' }}>
                        Camilan
                    </option>
                    <option value="Minuman"
                        {{ old('category') == 'Minuman' ? 'selected' : '' }}>
                        Minuman
                    </option>
                    <option value="Pencuci Mulut"
                        {{ old('category') == 'Pencuci Mulut' ? 'selected' : '' }}>
                        Pencuci Mulut
                    </option>
                </select>
            </div>

            {{-- BAHAN --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Bahan-bahan
                </label>
                <textarea name="ingredients"
                          rows="4"
                          class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-orange-200"
                          required>{{ old('ingredients') }}</textarea>
            </div>

            {{-- CARA MEMASAK --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Cara Memasak
                </label>
                <textarea name="instructions"
                          rows="4"
                          class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-orange-200"
                          required>{{ old('instructions') }}</textarea>
            </div>

            {{-- WAKTU --}}
            <div>
                <label class="block text-sm font-semibold text-orange-800 mb-1">
                    Waktu Masak (Menit)
                </label>
                <input type="number"
                       name="cooking_time"
                       value="{{ old('cooking_time') }}"
                       min="1"
                       class="w-full p-2 border rounded"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-orange-600 text-white py-2 rounded font-bold hover:bg-orange-700 transition">
                Simpan Resep
            </button>
        </form>
    </div>
</div>
@endsection
