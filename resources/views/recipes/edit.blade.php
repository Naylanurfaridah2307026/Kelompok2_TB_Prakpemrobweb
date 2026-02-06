@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <a href="{{ route('recipes.index') }}"
            class="text-orange-600 font-bold mb-6 inline-flex items-center hover:underline transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>

        <div class="bg-white p-8 rounded-2xl shadow-xl border border-orange-100">
            <div class="border-b border-orange-50 pb-4 mb-6">
                <h2 class="text-2xl font-bold text-amber-900">Edit Resep: {{ $recipe->title }}</h2>
                <p class="text-gray-500 text-sm">Perbarui informasi detail resep masakan Anda.</p>
            </div>

            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-5">
                @csrf
                @method('PUT') <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Judul Resep</label>
                    <input type="text" name="title" value="{{ old('title', $recipe->title) }}"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition"
                        required>
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Foto Masakan</label>
                    @if ($recipe->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $recipe->image) }}"
                                class="w-32 h-32 object-cover rounded-lg border border-orange-100">
                        </div>
                    @endif
                    <input type="file" name="image"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                        accept="image/*">
                    <p class="text-xs text-gray-500 mt-1 italic">Kosongkan jika tidak ingin mengubah foto.</p>
                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Kategori</label>
                    <select name="category"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition">
                        <option value="Makanan Utama" {{ $recipe->category == 'Makanan Utama' ? 'selected' : '' }}>Makanan
                            Utama</option>
                        <option value="Camilan" {{ $recipe->category == 'Camilan' ? 'selected' : '' }}>Camilan</option>
                        <option value="Minuman" {{ $recipe->category == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Pencuci Mulut" {{ $recipe->category == 'Pencuci Mulut' ? 'selected' : '' }}>Pencuci
                            Mulut</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Bahan-bahan</label>
                    <textarea name="ingredients" rows="5"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                        placeholder="Contoh: 2 butir telur, 500gr tepung terigu..."
                        required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                    @error('ingredients') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Instruksi Memasak</label>
                    <textarea name="instructions" rows="8"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                        placeholder="Langkah 1: Rebus air..."
                        required>{{ old('instructions', $recipe->instructions) }}</textarea>
                    @error('instructions') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-amber-950 mb-1">Waktu Masak (Menit)</label>
                    <input type="number" name="cooking_time" value="{{ old('cooking_time', $recipe->cooking_time) }}"
                        class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                        required min="1">
                    @error('cooking_time') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="submit"
                        class="flex-1 bg-orange-600 text-white py-3 rounded-xl font-bold hover:bg-orange-700 shadow-md transition-all active:scale-95">
                        Update Perubahan
                    </button>
                    <a href="{{ route('recipes.index') }}"
                        class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection