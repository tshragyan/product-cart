<?php


namespace App\Services;


use App\Dto\CreateCartDto;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

class CartService
{
    public function create(CreateCartDto $dto): void
    {
        $cart = $this->findByProductId($dto->product_id);

        if ($cart) {
            $cart->quantity = $cart->quantity + $dto->quantity;
        } else {
            $cart = new Cart();
            $cart->product_id = $dto->product_id;
            $cart->quantity = $dto->product_id;
        }

        $cart->save();
    }

    public function findByProductId(int $product_id): Cart|null
    {
        return Cart::where('product_id', $product_id)->first();
    }

    public function getDataForCartPage(): array
    {
        $items = Cart::get();
        $totalAmount = Cart::join('products', 'carts.product_id', '=', 'products.id')
            ->selectRaw('SUM(products.price * carts.quantity) as total_amount')
            ->value('total_amount');

        return compact('items', 'totalAmount');
    }

    public function clearCart(): void
    {
        Cart::query()->delete();
    }
}
