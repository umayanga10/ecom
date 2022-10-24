<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['category_id','name','slug','image','brand','model','short_desc','desc','keywords','technical_spcification','uses','warranty','status'];
}
