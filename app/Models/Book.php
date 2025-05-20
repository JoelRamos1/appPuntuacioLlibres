<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'summary',
        'publishing_date',
        'price',
        'image',
        'minimum_age'
    ];

    public function valuation() {
        return $this->belongsToMany(User::class, 'books_users')
                    ->withPivot('score', 'valuation')->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
