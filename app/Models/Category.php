<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    public function categoryProducts()
    {
        //oneToMany

       // pro

        
        //hasMany - nepavyks
        // belongsToMany
        //many to many rysi

        //Laravel automatika
        // category_product

        //Produktas priklauso vienai kategorija
        // Category.id => product.category_id
        //Cattegory hasMany Product


        // Produkt ID 1, name "Automobilis" , category_id 3
        //Catgeory ID 3, name "Zaisliniai automobiliai"

        //Product modelis
       //  new Product(array(ID => 1, name => "Automobilis", category_id => 3));
    //    new Category(array(ID => 3, name => "Zaisliniai automobiliai"));

        //hasMany

        // new Category(array(ID => 3, name => "Zaisliniai automobiliai", products =>
            // array(new Product(array(ID => 1, name => "Automobilis", category_id => 3)
        // ))


         return $this->belongsToMany(Product::class,'categories_products');       
    }

    //JavaScript

    //addClass - prideda klase
    //removeClass - istrina klase

    //toggle - jei nera klases, prideda, jei yra, istrina

    // attach - prideda i rysio lentele irasa
    // detach - atima irasus is rysio lenteles
    // sync - jei nera tokio iraso, prideda, jei yra, istrina
}
