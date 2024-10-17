<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, ProductService $service)
    {
        $products = $service->getProductsForMainPage();

        return view('product.index', compact('products'));
    }

}
