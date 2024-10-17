<?php


namespace App\Services;


use App\Dto\CreateOrderDto;
use App\Models\Order;

class OrderService
{
    public function create(CreateOrderDto $data): void
    {
        $order = new Order();
        $order->price = $data->price;
        $order->save();

        foreach ($data->product_ids as $key => $id) {
            $order->products()->attach([$id], ['quantity' => $data->quantities[$key]]);
        }
    }

    public function delete(Order $order): void
    {
        $order->delete();
    }

    public function getOrdersForMainPage(): array
    {
        $data = [];
        $orders = Order::with('products')->get();
        $totalAmount = Order::query()->sum('price');
        foreach( $orders as $order)
        {
            $productNames = $order->products->pluck('title')->toArray();
            $data[] = [
                'id' => $order->id,
                'price' => $order->price,
                'created_at' => $order->created_at,
                'productNames' => $productNames,
            ];
        }

        return ['orders' => $data, 'totalAmount' => $totalAmount];
    }
}
