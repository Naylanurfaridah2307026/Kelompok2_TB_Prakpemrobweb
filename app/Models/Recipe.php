<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'category',
        'ingredients',
        'instructions',
        'cooking_time',
        'is_public',
        'image'
    ];

    public function isFavoritedBy($user)
    {
        if (!$user)
            return false;
        return Favorite::where('user_id', $user->id)
            ->where('recipe_id', $this->id)
            ->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}