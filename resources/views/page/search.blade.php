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
        <form action="/search" method="POST">
            <input type="hidden" name="_token" value="{{  csrf_token()  }}">
            <input type="text" name="search" value="{{ old('search')}}" placeholder="Enter your search keyword">
            <button type="submit">Add</button>
        </form>
    </div>
</div>
@endsection