@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-center font-bold text-xl mb-4">Masuk</h2>
    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded" required>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 border rounded" required>
        <button type="submit" class="w-full bg-orange-600 text-white py-2 rounded">Login</button>
    </form>
</div>
@endsection