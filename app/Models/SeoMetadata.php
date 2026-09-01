<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeoMetadata extends Model
{
    use HasFactory;

    protected $table = 'seo_metadata';

    protected $fillable = [
        'content_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'robots',
    ];

    /**
     * SEO metadata belongs to content.
     */
    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
