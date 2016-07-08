@extends('master')
@section('content')
<div>
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
        <form action="/search-form" method="POST" class="form-inline">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            <div class="form-group">
                <input type="text" name="search" value="{{ old('search')}}" placeholder="Enter your search keyword" class="form-control">
            </div>
            <select name="category" class="form-control">
                <option value="">Choose</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ ucwords($category->name)}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary align-left">Search</button>
        </form>
        @if (count($products) > 0)
        <table class="table table-hovered" style="font-size:22px; margin-top:50px;">
            <thead>
                <tr>
                    <td>SN</td>
                    <td>Category</td>
                    <td>Name</td>
                    <td>Price</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $index => $product)
                <tr>
                    <td>{{ $index + 1}}</td>
                    <td>{{ ucwords($product->category->name) }}</td>
                    <td>{{ ucwords($product->name) }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if (count($products) > 0)
        {!! $products->render() !!}
        @endif
        @else
        <h4>No product matches your search</h4>
        @endif
    </div>
</div>
@endsection