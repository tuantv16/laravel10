<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{

    public function getData() {
        $data = Product::all()->toArray();
        echo '<pre>';
        var_dump($data);
        die('ok');
    }

}