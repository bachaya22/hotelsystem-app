@extends('user.layouts.master')
@section('content')


      <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Room</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- our_room -->
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
        @foreach ($room as $room )


          <div class="col-md-4 col-sm-6">
             <div id="serv_hover"  class="room">
                <div class="room_img">
                   <figure><img src="room/{{$room->image}}" alt="#"/></figure>
                </div>
                <div class="bed_room">
                   <h3>{{$room->roomtitle}}</h3>
                   <p> {{!! Str::limit($room->descrption,100)!!}}</p>
                   <a href="{{url ('roomdetail' ,$room->id)}}" class="btn btn-primary">Room detail</a>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </div>
 <!-- end our_room -->

   @endsection
