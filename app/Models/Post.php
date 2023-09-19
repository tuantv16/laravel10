<?php

namespace App\Models;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    public function observers()
    {
        return $this->hasMany(Observer::class);
    }
    
}
