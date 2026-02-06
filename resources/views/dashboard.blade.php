@extends('layouts.app')

@section('content')
    <div class="py-6">
        <h1 class="text-3xl font-extrabold text-orange-950 mb-8">Dashboard</h1>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600 text-2xl">
                    📜
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Resep Saya</p>
                    <p class="text-2xl font-black text-orange-900">{{ $totalMyRecipes }}</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-600 text-2xl">
                    ❤️
                </div>
                <div>
                    <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Favorit</p>
                    <p class="text-2xl font-black text-orange-900">{{ $totalFavorites }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Recent Activity --}}
            <div class="lg:col-span-2">
                <h3 class="text-xl font-bold text-amber-900 mb-4">Resep Terbaru di Katalog</h3>
                <div class="bg-white rounded-2xl shadow-sm border border-orange-100 overflow-hidden text-orange-900">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-orange-50">
                            <tr>
                                <th class="px-6 py-4 font-bold">Foto</th>
                                <th class="px-6 py-4 font-bold">Judul Resep</th>
                                <th class="px-6 py-4 font-bold">Kategori</th>
                                <th class="px-6 py-4 font-bold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-orange-50">
                            @forelse($latestRecipes as $recipe)
                                <tr class="hover:bg-orange-50/50 transition">
                                    <td class="px-6 py-4">
                                        @if ($recipe->image)
                                            <img src="{{ asset('storage/' . $recipe->image) }}"
                                                class="w-12 h-12 object-cover rounded-lg border border-orange-100">
                                        @else
                                            <div
                                                class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center text-[10px] text-orange-400 italic">
                                                No Pic</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium">{{ $recipe->title }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-orange-100 text-orange-600 text-xs rounded-full font-bold">
                                            {{ $recipe->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('recipes.show', $recipe->id) }}"
                                            class="text-orange-600 font-bold hover:underline">Lihat</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada resep.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div>
                <h3 class="text-xl font-bold text-amber-900 mb-4">Aksi Cepat</h3>
                <div class="space-y-4">
                    <a href="{{ route('recipes.create') }}"
                        class="block bg-orange-600 text-white p-4 rounded-2xl font-bold text-center hover:bg-orange-700 shadow-md transition-all active:scale-95">
                        + Tambah Resep Baru
                    </a>
                    <a href="{{ route('favorites.index') }}"
                        class="block bg-white text-orange-600 p-4 rounded-2xl font-bold text-center border border-orange-200 hover:bg-orange-50 transition-all">
                        Lihat Koleksi Favorit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection