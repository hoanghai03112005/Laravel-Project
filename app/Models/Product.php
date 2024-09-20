<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    # Quan hệ 1 - 1 -> dùng hasOne => trả về 1 đối tượng
    public function cat() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    protected $fillable = ['name', 'status', 'price', 'content','sale_price', 'image', 'category_id'];

    public function scopeFilter($query) {
        $key = request()->keyword;
        $catId = request()->catId;
        $order = request()->order;

        if($key) {
            $query = $query->where('name', 'LIKE', '%'.$key.'%'); //lưu mệnh đề điều kiện where cho biến $query (SELECT * FROM products where ...)
        }
        if($order) {
            $arr = explode('-', $order); // cắt chuỗi
            $query = $query->orderBy($arr[0], $arr[1]); //lưu truy vấn có order by (Select * FRom products order By id DESC|ASC)
        }
        if($catId) {
            $query = $query->where('category_id', $catId);
        }
        return $query;
    }
}
