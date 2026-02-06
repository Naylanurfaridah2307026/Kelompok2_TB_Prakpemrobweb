<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())->with('recipe')->get();
        return view('auth.favorites', compact('favorites'));
    }

    public function toggle(Recipe $recipe)
    {
        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('recipe_id', $recipe->id)
                            ->first();
        
        if ($favorite) {
            $favorite->delete();
            return back()->with('success', 'Dihapus dari favorit.');
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'recipe_id' => $recipe->id
        ]);

        return back()->with('success', 'Ditambahkan ke favorit!');
    }
}