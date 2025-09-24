<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    // Relasi: Step ini milik satu Recipe
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}