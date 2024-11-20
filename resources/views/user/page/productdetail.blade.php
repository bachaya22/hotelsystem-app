@extends('user.layouts.master')
@section('content')


<div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Food</h2>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4 offset-2">
            <div class="box">

                <div class="img-box">
                    <img src="{{ asset('productimage/' . $product->image) }}" alt="">

                </div>
                <div class="detail-box">
                    <h5>
                        {{ $product->title }}
                    </h5>
                    @if ($product->discountprice !== null)
                        <h6 class="text-danger">
                            discountprice
                            <br>
                            {{ $product->discountprice }}
                        </h6>
                        <h6 style="text-decoration: line-through " class="text-primary">
                            price
                            <br>
                            {{ $product->price }}
                        </h6>
                    @else
                        <h6 class="text-primary">
                            price
                            <br>
                            {{ $product->price }}
                        </h6>
                    @endif
                    <h6> <strong>product category: </strong> {{ $product->catogery }}</h6>
                    <h6><strong>product description:</strong> {{ $product->descrption }}</h6>
                    <h6> <strong>product price:</strong> {{ $product->quantity }}</h6>
                    <form action="{{ url('add_card', $product->id) }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                          <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 80px;">
                          <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </div>
                      </form>

                </div>
            </div>
        </div>
       </div>
       <div class="row">
       </div>
    </div>
</div>

@endsection
