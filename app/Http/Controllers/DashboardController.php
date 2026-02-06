<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Statistik
        $totalMyRecipes = Recipe::where('user_id', $userId)->count();
        $totalFavorites = Favorite::where('user_id', $userId)->count();
        $latestRecipes = Recipe::latest()->take(5)->get();

        return view('dashboard', compact('totalMyRecipes', 'totalFavorites', 'latestRecipes'));
    }
}
