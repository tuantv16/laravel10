<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function getData() {
        echo 'Vào trang sản phẩm thành công';
        die('ok');
        $data = Product::all()->toArray();
        echo '<pre>';
        var_dump($data);
        die('ok');
    }

}