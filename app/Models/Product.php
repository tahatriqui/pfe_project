<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categroy(){
        return $this->belongsTo(Category::class,"category_id");
    }

    public function users(){
        return $this->belongsToMany(User::class,"user_product");
    }
}
