@extends('layouts.app')
@section('content')
    <div class="max-w-2xl mx-auto">
        <a href="{{ route('recipes.index') }}" class="text-orange-600 font-bold mb-4 inline-block hover:underline">← Kembali
            ke Dashboard</a>

        <div class="bg-white rounded-2xl shadow-lg border border-orange-100 overflow-hidden">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" class="w-full h-64 object-cover">
            @endif

            <div class="p-8">
                <h1 class="text-3xl font-extrabold text-amber-950 mb-2">{{ $recipe->title }}</h1>
                <div class="flex gap-2 items-center mb-6">
                    <span
                        class="px-3 py-1 bg-orange-100 text-orange-700 rounded-full text-sm font-bold uppercase">{{ $recipe->category }}</span>
                    <span class="text-gray-500 text-sm italic">⏱ {{ $recipe->cooking_time }} Menit</span>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-bold text-amber-900 border-b border-orange-100 pb-2">Bahan-bahan</h3>
                    <p class="text-gray-700 mt-2 whitespace-pre-line">{{ $recipe->ingredients }}</p>
                </div>

                <div class="mt-8">
                    <h3 class="text-lg font-bold text-amber-900 border-b border-orange-100 pb-2">Cara Memasak</h3>
                    <p class="text-gray-700 mt-2 whitespace-pre-line">{{ $recipe->instructions }}</p>
                </div>
            </div>
        </div>
@endsection