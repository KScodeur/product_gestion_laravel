@extends('layouts.app')
@section('content')
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Product</h1>   
            <div>
                <h3>
                <a href="create" class="btn btn-primary">Add New Product</a>
                </h3>
                
            </div>
        </header>

        @if($message=Session::get('success'))
                <div>
                    <ul>
                        <li>{{ $message }}</li>
                     </ul>
                </div>

        @endif

        <div class="mt-5">
            <form method="GET" action="products" role="search" >
                <div class="border">
                    <button class="btn btn-success">Search</button>
                    <input class="" type="text" placeholder="Search product..." name="search" value="{{$search}}">
                </div>
            </form>
             
            <table class="table table-bordered mt-2 text-center">
                <thead >
                    <th>#</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>categeory</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <img src="{{ asset('images/' . $product->image)}}" alt="">
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td class="flex ">
                            <a href="{{url('edit/'.$product->id)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('delete/'.$product->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection('content')