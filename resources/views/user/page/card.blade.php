@extends('user.layouts.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Card </h1>
         <table class="table table-dark table-bordered">
            <tr>
                <th>product price</th>
                <th>product quantity</th>
                <th>price</th>
                <th>image</th>
                <th>action</th>
            </tr>
            <?php $totalprice=0; ?>
            @foreach ($card as $card )
                <tr>
                    <td>{{$card->product_title}}</td>
                    <td>{{$card->quantity}}</td>
                    <td>{{$card->price}}</td>
                    <td><img src="/productimage/{{$card->image}}" alt="" width="100px" height="100px"></td>
                     <td><a href="{{url('remove_card' , $card->id)}}" onclick="return confirm(' are you sure to delete this')" class="btn btn-danger">Remove product</a></td>
                </tr>
            <?php $totalprice=$totalprice+ $card->price; ?>

            @endforeach
         </table>
         <Div>
            totla price : {{$totalprice}}
         </Div>
         <div>
            <h1>processes payment method</h1>
            <a href="{{url ('cash_order')}}" class="btn btn-danger">cash delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">proccessed with card</a>
            <a href="{{url('checkout')}}" class="btn btn-danger">Jazz cash</a>

         </div>
        <!-- end slider section -->
        </div>
    </div>
    <!-- why section -->
</div>
    <!-- end arrival section -->
@endsection
