@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-orange-100">
        <h2 class="text-2xl font-bold text-amber-900 mb-6 text-center">Daftar Akun ResepKita</h2>
        
        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-amber-950">Nama</label>
                <input type="text" name="name" class="w-full p-2 border border-orange-200 rounded-lg" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-amber-950">Email</label>
                <input type="email" name="email" class="w-full p-2 border border-orange-200 rounded-lg" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-amber-950">Password (Min. 8 Karakter)</label>
                <input type="password" name="password" class="w-full p-2 border border-orange-200 rounded-lg" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-bold text-amber-950">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border border-orange-200 rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg font-bold hover:bg-orange-700 transition">Daftar Akun</button>
        </form>
    </div>
</div>
@endsection