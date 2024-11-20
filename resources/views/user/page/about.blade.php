@extends('user.layouts.master')
@section('content')


      <!-- end header inner -->
      <!-- end header -->
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>About Us</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about -->
 <div class="about">
    <div class="container-fluid">
       <div class="row">
        @foreach ($aboutdata as $item)


          <div class="col-md-5">
             <div class="titlepage">
                <h2>{{$item->title}}</h2>
                <p>{{$item->description}} </p>
                <a class="read_more" href="{{url('aboutdatadetail',$item->id)}}"> Read More</a>
             </div>
          </div>
          <div class="col-md-7">
             <div class="about_img">
                <figure><img src="uploads/aboutdatas/{{$item->image}}" alt="#"/></figure>
             </div>
          </div>
          @endforeach
       </div>
    </div>
 </div>
 <!-- end about -->


 @endsection
