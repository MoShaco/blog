<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Allow the following columns to be filled by the user
    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    // Define the relationhsip with User model
    public function user () {
        return $this->belongsTo(User::class);
    }
}
