@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->image }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->description }}</p>
            <p><strong>Price: </strong> ${{ $product->price }}</p>

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control mb-2">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
            </form>

            <a href="{{ route('cart.index') }}" class="btn btn-secondary mt-3">View Cart</a>
        </div>
    </div>
</div>
@endsection
