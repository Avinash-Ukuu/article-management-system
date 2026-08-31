<?php

namespace App\Models;
use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function contents(): BelongsToMany
    {
        return $this->belongsToMany(Content::class,'content_tag');
    }
}
