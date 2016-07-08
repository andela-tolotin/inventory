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
        <form action="/product/create" method="POST" class="form">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            Category : <select name="category" class="form-control">
                <option value="">Choose</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ ucwords($category->name)}}</option>
                @endforeach
            </select> <br/>
            Name: <input type="text" name="name" value="{{ old('name')}}" class="form-control" placeholder="Name"><br/>
           Price:  <input type="text" name="price" value="{{ old('price') }}" class="form-control"
           placeholder="Price"> <br/>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
@endsection