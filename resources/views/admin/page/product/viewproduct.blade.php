@extends('admin.layouts.master')
@section('content')
<div class="container bg-white text-black">
    <div class="row ">
        <div class="col-lg-8  offset-2">



    <h1 class="text-center fs-5">Add New Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{url('/add_product')}}" method="post" enctype="multipart/form-data" >
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Product Title</label>
            <input type="text" name="title" class="form-control" required="" id="title" placeholder="Enter product title" >
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="descrption">Descrption</label>
            <textarea name="descrption" class="form-control" id="descrption" required="" placeholder="Enter product descrption"></textarea>
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control" required="" id="image">
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="catagory">catagory</label>
            <select name="catagory" id="">
                <option value="" class="text-black" selected="" >seleted catagory</option>
                @foreach ($catagory as $catagory)
                <option class="text-black" value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>

                @endforeach
            </select>
        </div>

        <!-- Quantity -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required="" id="quantity" placeholder="Enter product quantity" ">
        </div>

        <!-- Price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" required="" id="price" placeholder="Enter product price" >
        </div>

        <!-- Discount Price -->
        <div class="form-group">
            <label for="discount_price">Discount Price</label>
            <input type="number" name="discountprice" class="form-control" required=""  id="discountprice" placeholder="Enter discount price" >
        </div>

        <!-- Submit Button -->
        <button type="submit" value="Add Product" class="btn btn-primary text-align-center mb-5">Add Product</button>
    </form>
</div>
</div>
</div>
@endsection
