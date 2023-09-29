<?php

namespace App\Models;

use App\Enums\News\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Scope;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'img',
        'status',
        'description',
        'created_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function scopeStatus(Builder $query): void
    {
        if (request()->has('F'))
        {
            $query->where('status', request()->query('F'));
        }
    }
}
