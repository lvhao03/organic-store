<?php

namespace App\Models;
use APP\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function product(){
        $this->belongsTo(Product::class);
    }
}
