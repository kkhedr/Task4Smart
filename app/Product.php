<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';

    protected $primaryKey = 'id';

    protected $fillable =['id','name','desc','category_id','image','rating'];

    public function Category_namee(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function Images_names(){
        return $this->hasMany(Product_Images::class);
    }

}
