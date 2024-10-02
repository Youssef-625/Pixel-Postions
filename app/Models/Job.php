<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['job'] ?? false, function ($query, $job) {
            $query->where(fn($query) => $query->where('title', 'like', '%' . $job . '%')
            )->orWhereHas('tags',fn($query) => $query->where('name', 'like', '%' . $job . '%'));
        }
        );
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function tag(string $name)
    {
        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);
    }

    public function tagsNames()
    {
        return $this->tags->pluck('name')->implode(', ');
    }
}
