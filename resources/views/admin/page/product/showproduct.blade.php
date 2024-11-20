@extends('admin.layouts.master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2">


                <h1 class="text-center fs-5 m-5">Products List</h1>

                @if ($product->isEmpty())
                    <p class="text-center">No products found.</p>
                @else
                    <table class="table-responsive text-black table-bordered  bg-white ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Descrption</th>
                                <th>catagory</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount Price</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ $product->descrption }}</td>

                                    <td>{{ $product->catagory }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discountprice }}</td>
                                    <td>
                                    
                                            <img src="{{ asset('/productimage/' . $product->image) }}" alt="{{ $product->title }}"
                                                width="50">

                                    </td>
                                    <td><a class="btn btn-danger" onclick="return confirm('are you sure to delete this?')" href="{{url('delete_product', $product->id)}}">Delete</a></td>
                                    <td><a class="btn btn-success" href="{{url('edit_product' ,$product->id)}}">Edit</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
