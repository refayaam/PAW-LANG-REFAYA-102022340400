<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $table = 'articles';

    protected $fillable = ['title', 'content', 'image'];

    /**
     * Define a relationship indicating that this article belongs to one user.
     * 
     */
    public function user()
    {
        //
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
