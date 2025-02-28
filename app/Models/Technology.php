<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    /** @use HasFactory<\Database\Factories\TechnologyFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function portfolio(): BelongsToMany
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_technology');
    }
}
