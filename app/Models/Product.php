<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id','gambar', 'price', 'description', 'stock_quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

