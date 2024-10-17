@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center flex-wrap">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Products</th>
                <th scope="col">Amount</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order['id'] }}</th>
                    <td>{{ implode(', ', $order['productNames']) }}</td>
                    <td>{{ $order['price'] }}</td>
                    <td>
                        <form action="{{route('order.delete', ['order' => $order['id']])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p>Total Amount: {{$totalAmount}} </p>
    </div>
@endsection
