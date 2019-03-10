<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    protected $table ='product_images';

    protected $primaryKey = 'id';

    protected $fillable =['id','image','product_id'];




}
