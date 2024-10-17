<?php

namespace App\Http\Controllers;

use App\Dto\CreateOrderDto;
use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function index(OrderService $orderService)
    {
        $data = $orderService->getOrdersForMainPage();
        return view('order.index', ['orders' => $data['orders'], 'totalAmount' => $data['totalAmount']]);
    }

    public function create(OrderCreateRequest $request, OrderService $orderService, CartService $cartService)
    {
        $dto = CreateOrderDto::fromRequest($request->validated());
        $orderService->create($dto);
        $cartService->clearCart();
        Session::flash('message', 'Order Created Success Full');

        return redirect()->back();
    }

    public function delete(Order $order, OrderService $orderService)
    {
        $orderService->delete($order);
        Session::flash('message', 'Order Deleted');
        return redirect()->back();
    }
}
