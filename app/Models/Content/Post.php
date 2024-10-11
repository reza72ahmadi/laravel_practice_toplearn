<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    /**
     * Define the sluggable configuration for the model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'summary',
        'slug',
        'image',
        'status',
        'tags',
        'body',
        'published_at',
        'author_id',
        'category_id',
        'commentable'
    ];

    /**
     * Get the category that the post belongs to.
     */
    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
