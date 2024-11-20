@extends('user.layouts.master')
@section('content')
@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<!-- Your form and other HTML content -->


<!-- Your form and other HTML content -->

<div  class="our_room">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>
       <div class="row">


          <div class="col-md-8 col-sm-8">
             <div id="serv_hover"  class="room">
                <div class="room_img text-align-center">
                    <figure>
                        <!-- Ensure $room is an object and has an image -->
                            <img src="{{ asset('room/' . $room->image) }}" width="300px" height="200px" alt="Room Image">

                    </figure>



                </div>
                <div class="bed_room">
                    <h3>Roomtitle: {{ $room && is_object($room) ? $room->roomtitle : 'Room title not available' }}</h3>
                   <p> {{$room->descrption}}</p>
                   <p> Wifi : {{$room->wifi}}</p>

                   <p>Room price {{$room->price}}</p>

                </div>
             </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <h1 class=" text-center fs-5 ">Book Room</h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
             <form action="{{url('bookroom' ,$room->id)}}" method="post">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="name"
                    @if(Auth::id())
                    value="{{Auth::user()->name}}"
                    @endif>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email"
                    @if(Auth::id())
                    value="{{Auth::user()->email}}"
                    @endif>
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone"
                    @if(Auth::id())
                    value="{{Auth::user()->phone}}" @endif>
                </div>
                <div>
                    <label>Start date</label>
                    <input type="date" name="startDate" id="startDate">
                </div>
                <div>
                    <label>End date</label>
                    <input type="date" name="endDate" id="endDate">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" valu="book room">
                </div>
             </form>
          </div>

       </div>
    </div>
 </div>

<script>
    $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;

    var day = dtToday.getDate();

    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();

    if(day < 10)
     day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#startDate').attr('min', maxDate);
    $('#endDate').attr('min', maxDate);

});
</script>

@endsection
