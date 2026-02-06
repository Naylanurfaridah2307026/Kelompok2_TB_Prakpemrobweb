@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        <div class="mb-6">
            <a href="{{ route('profile.index') }}" class="text-orange-600 font-bold mb-4 inline-block hover:underline">← Kembali ke Profil</a>
            <h1 class="text-3xl font-extrabold text-orange-950">Edit Profil</h1>
            <p class="text-orange-800">Perbarui informasi akun Anda.</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-orange-100 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-bold text-amber-950 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                            required>
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-amber-950 mb-1">Alamat Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                            required>
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 border-t border-orange-50">
                        <h3 class="text-lg font-bold text-amber-900 mb-4">Ubah Password</h3>
                        <p class="text-sm text-gray-500 mb-4 italic text-sm text-gray-500 mb-4">Kosongkan jika tidak ingin
                            mengubah password.</p>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-amber-950 mb-1">Password Baru</label>
                                <input type="password" name="password"
                                    class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition"
                                    placeholder="Minimal 8 karakter">
                                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-amber-950 mb-1">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation"
                                    class="w-full p-3 border border-orange-200 rounded-xl outline-none focus:ring-2 focus:ring-orange-500 transition">
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-orange-600 text-white py-3 rounded-xl font-bold hover:bg-orange-700 shadow-md transition-all active:scale-95">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection