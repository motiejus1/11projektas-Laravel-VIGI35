@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Products count</th>
                    <th>Actions</th>
                </tr>

                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            {{$category->categoryProducts->count()}}
                        </td>
                        <td>
                            Veiksmai
                        </td>
                    </tr>
                @endforeach
            </table>
            
        </div>
    </div>    

@endsection