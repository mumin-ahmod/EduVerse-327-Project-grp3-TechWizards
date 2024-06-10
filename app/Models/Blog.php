<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey ='blog_id';

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'blog_image',
        'vdo_link',
    ];

    // Define the user relationship (assuming User model and 'user_id' foreign key).
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
