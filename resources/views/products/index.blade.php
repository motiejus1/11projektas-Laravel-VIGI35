@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Categories</th>
                    <th>Actions</th>
                </tr>

                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>

                        <td>
                            @foreach ($product->productCategories as $category)
                                {{$category->name}}
                            @endforeach
                            {{-- Atvaizduosim sarasa kategoriju, kurioms priklauso produktas --}}
                        </td>
                        <td>
                            <a href="{{route('products.edit', $product)}}" class="btn btn-primary">Edit</a>
                            <form method="POST" action="{{route('products.destroy', $product)}}">
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            
        </div>
    </div>    

@endsection