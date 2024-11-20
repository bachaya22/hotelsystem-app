@extends('admin.layouts.master')
@section('content')
<div class="container bg-white text-black">
    <div class="row">
        <div class="col-lg-8 offset-2">

            <h1 class="text-center fs-5">Edit Product</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Update form -->
            <form action="{{ url('/edit_product_confirm', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
               <!-- Use PUT for updates -->

                <!-- Title -->
                <div class="form-group">
                    <label for="title">Product Title</label>
                    <input type="text" name="title" class="form-control text-black" required="" id="title" value="{{  $product->title}}" placeholder="Enter product title"
                     >
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="descrption">Description</label>
                    <textarea name="descrption" class="form-control text-black" id="descrption" required=""
                     placeholder="Enter product description" value={{ $product->descrption }}>{{ $product->descrption }}</textarea>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <img src="{{ asset('productimage/'.$product->image) }}" width="100" alt="Current Image">
                </div>

                <!-- catagory -->
                <div class="form-group">
                    <label for="catagory">catagory</label>
                    <select name="catagory" id="catagory">
                        <option value="" class="text-black" selected="">Select catagory</option>
                        @foreach ($catagory as $catagory)
                            <option class="text-black" value="{{ $catagory->catagory_name }}" {{ $product->catagory == $catagory->catagory_name ? 'selected' : '' }}>
                                {{ $catagory->catagory_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" class="form-control text-black" required="" id="quantity"
                     placeholder="Enter product quantity" value="{{$product->quantity }}">
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control text-black" required="" id="price" placeholder="Enter product price"
                     value="{{  $product->price }}">
                </div>

                <!-- Discount Price -->
                <div class="form-group">
                    <label for="discount_price">Discount Price</label>
                    <input type="number" name="discountprice" class="form-control text-black" required="" id="discountprice"
                    placeholder="Enter discount price" value="{{  $product->discountprice }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary text-align-center mb-5">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
