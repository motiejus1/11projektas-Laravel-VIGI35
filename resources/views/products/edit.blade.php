@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        
            <form method="POST" action="{{route('products.update', $product)}}">
                @csrf
                <input class="form-control" type="text" name="name" placeholder="Product name" value="{{$product->name}}">
                <input class="form-control" type="text" name="description" placeholder="Product description" value="{{$product->description}}">
                <input class="form-control" type="text" name="price" placeholder="Product Price" value= "{{$product->price}}">
                {{-- Produktas be kategorijos --}}
                {{-- category_id --}}
                <div class="form-group">
                    @foreach ($categories as $category)

                        @if ($product->productCategories->contains($category->id))
                            <input type="checkbox" name="category_id[]" value="{{$category->id}}" checked>{{$category->name}}</option>
                        @else    
                            <input type="checkbox" name="category_id[]" value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </div>    
                
                <button class="btn btn-primary" type="submit">Save Product</button>
             
            </form>
        </div>
    </div>    

@endsection