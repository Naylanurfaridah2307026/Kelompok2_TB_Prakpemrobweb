@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <div class="mb-6 flex justify-between items-end">
            <div>
                <h1 class="text-3xl font-extrabold text-orange-950">Profil Saya</h1>
                <p class="text-orange-800">Detail informasi akun Anda.</p>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="bg-orange-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-orange-700 shadow-md transition-all active:scale-95">
                Edit Profil
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-orange-100 overflow-hidden">
            <div class="p-8 space-y-6">
                <div class="flex items-center gap-6 pb-6 border-b border-orange-50">
                    <div
                        class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 text-3xl font-bold uppercase">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-amber-950">{{ $user->name }}</h2>
                        <p class="text-gray-500">Member sejak {{ $user->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-400 uppercase tracking-wider">Nama Lengkap</label>
                        <p class="text-lg font-semibold text-amber-900 mt-1">{{ $user->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 uppercase tracking-wider">Alamat Email</label>
                        <p class="text-lg font-semibold text-amber-900 mt-1">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Logout Section --}}
        <div class="mt-6 bg-white rounded-2xl shadow-md border border-red-50 overflow-hidden">
            <div class="p-6 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-red-900">Sesi Akun</h3>
                    <p class="text-sm text-gray-500">Keluar dari akun Anda saat ini.</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="bg-red-50 text-red-600 px-6 py-2 rounded-xl font-bold hover:bg-red-600 hover:text-white transition-all">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection