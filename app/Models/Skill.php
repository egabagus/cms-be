<?php

namespace App\Models;

use App\Enums\SkillLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $guarded = [];

    public function casts(): array
    {
        return [
            'level' => SkillLevelEnum::class,
        ];
    }
}
