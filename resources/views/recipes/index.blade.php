@extends('layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row justify-between mb-8 gap-4">
        <h1 class="text-3xl font-extrabold text-orange-950">Katalog Resep</h1>

        <form method="GET" action="{{ route('recipes.index') }}" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari resep..."
                class="p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 shadow-sm transition w-full md:w-64">
            <button
                class="bg-orange-600 text-white px-6 rounded-xl font-bold hover:bg-orange-700 transition shadow-md active:scale-95">Cari</button>
        </form>
    </div>

    @if(request('search'))
        <div class="mb-6 bg-orange-50 p-4 rounded-xl border border-orange-100">
            <span class="text-sm text-gray-600">Hasil pencarian untuk: <strong
                    class="text-orange-900">"{{ request('search') }}"</strong></span>
            <a href="{{ route('recipes.index') }}" class="ml-2 text-sm text-orange-700 font-bold hover:underline">✕ Reset</a>
        </div>
    @endif

    {{-- Section Resep Saya --}}
    @if($myRecipes->count() > 0)
        <div class="mb-12">
            <h2 class="text-xl font-bold text-amber-900 mb-6 flex items-center gap-2">
                <span class="w-2 h-8 bg-orange-500 rounded-full"></span>
                Resep Kiriman Saya
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                @foreach($myRecipes as $recipe)
                    @include('recipes._card', ['recipe' => $recipe, 'isOwner' => true])
                @endforeach
            </div>
        </div>
    @endif

    {{-- Section Resep Orang Lain --}}
    <div>
        <h2 class="text-xl font-bold text-amber-900 mb-6 flex items-center gap-2">
            <span class="w-2 h-8 bg-gray-300 rounded-full"></span>
            Resep Komunitas
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            @forelse($otherRecipes as $recipe)
                @include('recipes._card', ['recipe' => $recipe, 'isOwner' => false])
            @empty
                <div
                    class="col-span-3 py-20 text-center bg-white rounded-3xl border-2 border-dashed border-orange-100 text-gray-400">
                    <p class="text-lg italic">Belum ada resep dari komunitas.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection