@extends('layouts.app')
@section('content')
    <div class="mb-6">
        <a href="{{ route('recipes.index') }}" class="text-orange-600 font-bold inline-block hover:underline">← Kembali ke
            Dashboard</a>
        <h1 class="text-3xl font-extrabold text-orange-950 mt-4">Koleksi Favorit</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($favorites as $fav)
            <div class="bg-white rounded-xl border border-orange-100 shadow-sm overflow-hidden hover:shadow-md transition">
                @if($fav->recipe->image)
                    <img src="{{ asset('storage/' . $fav->recipe->image) }}" class="w-full h-40 object-cover">
                @else
                    <div class="w-full h-40 bg-orange-100 flex items-center justify-center text-orange-300 italic text-sm">
                        Tanpa Foto
                    </div>
                @endif
                <div class="p-5">
                    <span
                        class="text-[10px] font-bold uppercase tracking-widest text-orange-500 bg-orange-50 px-2 py-0.5 rounded-full">{{ $fav->recipe->category }}</span>
                    <h3 class="text-lg font-bold text-amber-950 mt-1 line-clamp-1">{{ $fav->recipe->title }}</h3>

                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('recipes.show', $fav->recipe->id) }}"
                            class="bg-orange-50 text-orange-600 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-orange-600 hover:text-white transition-all shadow-sm flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Detail
                        </a>
                        <form action="{{ route('recipes.favorite', $fav->recipe->id) }}" method="POST">
                            @csrf
                            <button class="bg-red-50 text-red-600 px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-red-600 hover:text-white transition-all shadow-sm flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-gray-400">Belum ada resep favorit.</p>
            </div>
        @endforelse
    </div>
@endsection