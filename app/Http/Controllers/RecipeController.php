<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::query();
        $isSearch = $request->has('search') && $request->search != '';
        if ($isSearch) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $allRecipes = $query->latest()->get();

        $myRecipes = $allRecipes->where('user_id', Auth::id());
        $otherRecipes = $allRecipes->where('user_id', '!==', Auth::id());

        return view('recipes.index', compact('myRecipes', 'otherRecipes', 'isSearch'));
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipes', 'public');
        }

        Recipe::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
            'cooking_time' => $request->cooking_time,
            'image' => $imagePath,
        ]);

        return redirect()->route('recipes.index')->with('success', 'Resep berhasil ditambah!');
    }

    public function edit(Recipe $recipe)
    {
        abort_if($recipe->user_id !== Auth::id(), 403, 'Anda tidak memiliki akses ke resep ini.');
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
        abort_if($recipe->user_id !== Auth::id(), 403, 'Anda tidak memiliki akses ke resep ini.');
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'ingredients' => 'required',
            'instructions' => 'required',
            'cooking_time' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            $data['image'] = $request->file('image')->store('recipes', 'public');
        }

        $recipe->update($data);
        return redirect()->route('recipes.index')->with('success', 'Resep berhasil diperbarui!');
    }

    public function destroy(Recipe $recipe)
    {
        abort_if($recipe->user_id !== Auth::id(), 403, 'Anda tidak memiliki akses ke resep ini.');
        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Resep dihapus!');
    }
}