<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes; // Menggunakan HasRoles

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi: Satu User bisa membuat banyak Recipe
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class, 'author_id');
    }

    // Relasi: Satu User bisa punya banyak Plan
    // public function plans(): HasMany
    // {
    //     return $this->hasMany(Plan::class);
    // }

    // Relasi: Satu User bisa punya banyak Shopping List
    // public function shoppingLists(): HasMany
    // {
    //     return $this->hasMany(ShoppingList::class);
    // }
}
