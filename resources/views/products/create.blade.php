@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        
            <form method="POST" action="{{route('products.store')}}">
                @csrf
                <input class="form-control" type="text" name="name" placeholder="Product name">
                <input class="form-control" type="text" name="description" placeholder="Product description">
                <input class="form-control" type="text" name="price" placeholder="Product Price">
                {{-- Produktas be kategorijos --}}
                {{-- category_id --}}
                <div class="form-group">
                    @foreach ($categories as $category)
                        <input type="checkbox" name="category_id[]" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </div>    
                
                <button class="btn btn-primary" type="submit">Save Product</button>
             
            </form>
        </div>
    </div>    

@endsection