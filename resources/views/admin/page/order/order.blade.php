@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4 class="text-center  fw-bold fs-3">All Orders</h4>

                <div class="table-responsive">
                    <table class="table table-dark table-striped table-bordered border-secondary">
                        <thead c>
                            <tr>
                                <th >Name</th>
                                <th >Email</th>
                                <th >Address</th>
                                <th >Phone</th>
                                <th >Product Title</th>
                                <th >Quantity</th>
                                <th >Price</th>
                                <th >Payment Status</th>
                                <th >Delivery Status</th>
                                <th >Image</th>
                                <th>Delivery</th>
                                <th>print pdf</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $order)
                                <tr>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->product_title }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->delivery_status }}</td>
                                    <td>
                                        <img src="productimage/{{ $order->image }}" alt="Product Image"
                                            class="img-fluid rounded" style="width: 50px;">
                                    </td>
                                    @if ($order->delivery_status='processsing')


                                    <td>
                                        <a class="btn btn-primary" onclick="return confirm'are you sure to add this ' " href="{{url ('delivery',$order->id,)}}">delivery</a>
                                    </td>
                                    @else
                                    <p class="text-primary ">delivered</p>
                                    @endif
                                    <td>
                                        <a href="{{url('printpdf',$order->id)}}" class="btn btn-primary"print pdf></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
