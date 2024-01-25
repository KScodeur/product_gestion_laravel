@extends('layouts.app')
@section('content')
    <div class="container">
            <header class="d-flex justify-content-between my-4">
                <h1>Add New product</h1>   
                <div>
                    <h3>
                    <a href="/" class="btn btn-primary">Back</a>
                    </h3>
                    
                </div>
            </header>
            @if($errors->any())
                <div>
                    @foreach($errors->all() as $error)
                    <div class="alert alert-success">{{ $error }}</div>
                    @endforeach
                </div>

            @endif

            <form action="store" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="name" placeholder="Book title">
                    </div>
                    <div class="form-element my-4">
                        <textarea type="text" class="form-control" name="description" placeholder="Description" rows="5"></textarea>
                    </div>
                    <div class="form-element my-4">
                    <select name="category" class="form-control" >
                        <option value="">Select categeory type</option>
                        @foreach (json_decode('{"Smartphone": "Smartphone", "Smart TV": "Smart TV", "Computer": "Computer"}',true) as $optionKey => $optionValue)
                        <option value="{{$optionKey}}"> {{$optionValue}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="quantity" placeholder="quantity">
                    </div>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="price" placeholder="price">
                    </div>
                    <div class="form-element my-4">
                        <img src="" alt="" class="mt-2" id="file.preview" width="100px">
                        <input type="file" class="form-control" name="image" accept="image/*" onchange="showFile(event)" placeholder="image">
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </div>
            </form>
    </div>
    <script>
        function showFile(event){
            let input = event.target;
            let reader = new FileReader();
            reader.onload = function(){
                let dataURL = reader.result;
                let output = document.getElementById('file.preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection('content')