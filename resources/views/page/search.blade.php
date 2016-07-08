@extends('master')
@section('content')
<div>
    <h4>Welcome to Add Product Page</h4>
    <div class="product_form">
        @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="text-danger">
            <strong>Whoops! Something went wrong!</strong>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @else
        {{ session('status') }}
        @endif
        <form action="/search-form" method="POST" class="form">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            <div class="form-group">
                <input type="text" name="search" value="{{ old('search')}}" placeholder="Enter your search keyword" class="form-control">
                <button type="submit" class="btn btn-primary align-left">Search</button>
            </div>
        </form>
        @if (count($products) > 0)
        <ul class="list-inline">
            @foreach($products as $product)
            <li>{{ ucwords($product->category->name) }} | {{ ucwords($product->name) }} | {{ $product->price }}</li>
            @endforeach
        </ul>
        @if (count($products) > 0)
        {!! $products->render() !!}
        @endif
        @else
        <h2>No product matches your search</h2>
        @endif
    </div>
</div>
@endsection