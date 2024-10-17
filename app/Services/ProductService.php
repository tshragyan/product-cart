<?php


namespace App\Services;


use App\Dto\CreateProductDto;
use App\Models\Product;

class ProductService
{
    public function getProductsForMainPage($page = 1, $orderBy = 'id', $orderType = null)
    {
        return Product::paginate(5);
    }

    public function findByTitle(string $title): Product|null
    {
        return Product::where('title', $title)->first();
    }

    public function create(CreateProductDto $data)
    {
        $product = new Product();
        $product->title = $data->title;
        $product->price = $data->price;
        $product->save();
    }
}
