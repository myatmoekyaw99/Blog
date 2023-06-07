<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // protected $fillable = ['title','description','photo'];
    // protected $guarded = ['id'];
       protected $with = ['category','author'];

    //blog belongs to a category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public  function getRouteKeyName()
    {
        return 'slug';
    }
}
