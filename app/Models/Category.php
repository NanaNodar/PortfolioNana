<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_creator_id'];

    protected $guarded = [];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    public function userCreator(){
        return $this->belongsTo(User::class,'user_creator_id');
    }
}
