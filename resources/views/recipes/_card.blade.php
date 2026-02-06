<div
    class="bg-white rounded-3xl shadow-sm border border-orange-50 hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1">
    <div class="relative">
        @if($recipe->image)
            <img src="{{ url('storage/' .$recipe->image) }}" class="w-full h-56 object-cover">
        @else
            <div class="w-full h-56 bg-orange-100 flex items-center justify-center text-orange-300 italic">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif

        @if(isset($isOwner) && $isOwner)
            <div class="absolute top-4 left-4">
                <span
                    class="bg-orange-600 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-lg">
                    Resep Saya
                </span>
            </div>
        @endif
    </div>

    <div class="p-6">
        <div class="flex justify-between items-start mb-2">
            <span
                class="text-[10px] font-bold text-orange-500 bg-orange-50 px-2 py-1 rounded-md uppercase tracking-wide">
                {{ $recipe->category }}
            </span>
            <span class="text-xs text-gray-400 flex items-center gap-1">
                ⏱ {{ $recipe->cooking_time }} Menit
            </span>
        </div>

        <h3 class="text-xl font-bold text-amber-950 mb-2 truncate" title="{{ $recipe->title }}">{{ $recipe->title }}
        </h3>
        <p class="text-sm text-gray-500 line-clamp-2 mb-6 min-h-[40px]">
            {{ $recipe->ingredients }}
        </p>

        <div class="flex items-center justify-between border-t border-orange-50 pt-4">
            <div class="flex gap-3 items-center">
                <a href="{{ route('recipes.show', $recipe->id) }}"
                    class="text-orange-600 font-bold text-sm hover:text-orange-800 transition">
                    Detail
                </a>
                @auth
                    <form action="{{ route('recipes.favorite', $recipe->id) }}" method="POST">
                        @csrf
                        <button class="text-red-400 hover:text-red-600 hover:scale-125 transition">
                            ♥
                        </button>
                    </form>
                @endauth
            </div>

            @auth
                @if($recipe->user_id === Auth::id())
                    <div class="flex gap-2">
                        <a href="{{ route('recipes.edit', $recipe->id) }}"
                            class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-600 hover:text-white transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus resep ini?')">
                            @csrf @method('DELETE')
                            <button
                                class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
</div>