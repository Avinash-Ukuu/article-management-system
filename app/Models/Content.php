<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content_type',
        'excerpt',
        'content',
        'featured_image',
        'author_id',
        'quote_author',
        'status',
        'published_at',
        'is_featured',
        'views_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'views_count' => 'integer',
    ];

    /**
     * Content belongs to a category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Content belongs to a user/author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Content belongs to many tags.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'content_tag'
        );
    }

    /**
     * Content has one SEO metadata record.
     */
    public function seoMetadata(): HasOne
    {
        return $this->hasOne(SeoMetadata::class);
    }

    /**
     * Published content.
     *
     * Content is publicly visible only when:
     * status = published
     * AND published_at is null or already reached.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->where(function (Builder $query) {
                $query
                    ->whereNull('published_at')
                    ->orWhere('published_at', '<=', now());
            });
    }

    /**
     * Draft content.
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scheduled content.
     */
    public function scopeScheduled(Builder $query): Builder
    {
        return $query
            ->where('status', 'scheduled')
            ->whereNotNull('published_at')
            ->where('published_at', '>', now());
    }

    /**
     * Featured content.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query
            ->where('is_featured', true)
            ->published();
    }
}
