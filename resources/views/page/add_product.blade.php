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
        <form action="/product/create" method="POST">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            Category : <select name="category">
                <option value="">Choose</option>
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