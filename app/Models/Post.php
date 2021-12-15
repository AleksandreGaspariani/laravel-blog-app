<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','photo'];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'id','comment_id');
    }

    public function photos(){
        return $this->hasMany(Picture::class,'id','id');
    }

}
