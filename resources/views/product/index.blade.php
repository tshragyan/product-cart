@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-wrap" style="margin-bottom: 20px">
        @foreach($products as $product)
            <div class="card col col-md-4" style="width: 18rem;">
                <div class="card-body">
                    <form action="{{route('cart.add')}}" method="post">
                        @csrf
                        <h5 class="card-title">Title: {{ $product->title }}</h5>
                        <p class="card-text">Price: {{ $product->price }}</p>
                        <input type="number" class="form-control" name="quantity" placeholder="quantity">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Добавить В Карзину</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
            {{ $products->links() }}

@endsection
