<?php

namespace App\Http\Controllers;

use App\Dto\CreateCartDto;
use App\Http\Requests\CreateCartRequest;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CartService $cartService)
    {
        $data = $cartService->getDataForCartPage();
        return view('cart.index', ['items' => $data['items'], 'totalAmount' => $data['totalAmount']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateCartRequest $request, CartService $cartService)
    {
        $data = CreateCartDto::fromRequest($request->validated());
        $cartService->create($data);
        Session::flash('message', 'Product Added To Cart');
        return redirect()->back();
    }

}
