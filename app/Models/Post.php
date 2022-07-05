<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cvierbrock\EloquentSluggable\Slugabble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ];
        ];
    }
}
