<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // Relasi: Recipe ini dibuat oleh satu User (author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi: Satu Recipe punya banyak Step
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class)->orderBy('step_number');
    }

    // Relasi Many-to-Many dengan Ingredient
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredient')
            ->withPivot('id', 'quantity', 'unit', 'notes');
    }

    // Relasi Many-to-Many dengan Category
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'recipe_category');
    }
}