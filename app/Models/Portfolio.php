<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortfolioFactory> */
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Portfolio $data) {
            $data->slug = Str::slug($data->title);
        });
    }

    public function technology(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
