<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;


    public function productCategories(){

        //foreign key, primary key, rysio lenteles pavadinimas
        // pivot table
        return $this->belongsToMany(Category::class,'categories_products');
    }
}
