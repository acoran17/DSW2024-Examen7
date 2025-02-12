<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'summary',
        'body',
        'published_at',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function votes() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vote::class);
    }
}

