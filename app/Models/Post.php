<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cvierbrock\EloquentSluggable\Slugabble;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use HasFactory; //importante para que el seeder se ejecute correctamente

    protected $fillable = [
        'title',
        'body',
        'image', //la imagen del post
        'iframe',
        'user_id',
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    //relacion entre las tablas
    //esta configuracion especifica que este post pertence a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute()
    {
        return substr($this->body, 0, 140);
    }

    public function getGetImageAttribute()
    {
        if($this->image){
            return url('storage/' . $this->image);
        }
    }
}
