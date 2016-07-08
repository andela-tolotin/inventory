@extends('master')
@section('content')
<div>
    <h4>Welcome to Add Product Page</h4>
    <div class="product_form">
        <form action="/product/create" method="POST">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            Category : <select name="category">
                <option>Choose</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ ucwords($category->name)}}</option>
                @endforeach
            </select> <br/>
            Name: <input type="text" name="name" value="{{ old('name')}}"><br/>
           Price:  <input type="text" name="price" value="{{ old('price') }}"> <br/>
            <button type="submit">Add</button>
        </form>
    </div>
</div>
@endsection