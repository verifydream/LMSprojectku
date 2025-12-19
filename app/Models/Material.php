<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Material extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'content',
        'thumbnail',
        'file_pdf',
        'file_ppt',
        'file_word',
        'file_video',
        'is_active',
        'rating',
        'views'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($material) {
            if (empty($material->slug)) {
                $material->slug = Str::slug($material->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
