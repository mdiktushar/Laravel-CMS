<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [];
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // accessor
    public function setPostImageAttribute($val) {
        $this->attributes['post_image'] = 'storage/'.$val;
    }

    // metutator
    public function getPostImageAttribute($val) {
        return asset($val);
    }
}
