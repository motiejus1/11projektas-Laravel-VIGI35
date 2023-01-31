@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
        
            <form method="POST" action="{{route('categories.store')}}">
                @csrf
                <input class="form-control" type="text" name="name" placeholder="Category name">
                <input class="form-control" type="text" name="description" placeholder="Category description">
                {{-- Kategorija be produktu --}}
                <button class="btn btn-primary" type="submit">Save Category</button>
                
            </form>
        </div>
    </div>    

@endsection