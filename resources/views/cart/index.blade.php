@extends('layouts.app')

@section('content')
    <form action="{{ route('order.create') }}" method="post">
        @csrf
    <div class="container d-flex justify-content-center flex-wrap">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->product->price }}</td>
                </tr>
                <input type="hidden" name="product_ids[]" value="{{$item->product->id}}">
                <input type="hidden" name="quantities[]" value="{{$item->quantity}}">
            @endforeach
            </tbody>
        </table>
        <input type="hidden" name="price" value="{{$totalAmount}}">

        @if($items->count())
            <p class="col col-md-10">Total Amount: {{ $totalAmount }}</p>
            <button type="submit" class="btn btn-success col col-md-10" >Оформить Заказ</button>
        @endif

    </div>
    </form>

@endsection
