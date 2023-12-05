<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'description',
        'image_url',
        'stock_quantity',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
