@extends('user.layouts.master')
@section('content')

<!-- about -->
<div class="about">
    <div class="container-fluid">
       <div class="row">


          <div class="col-md-5">
             <div class="titlepage">
                <h2>{{$item->title}}</h2>
                <p>{{$item->description}} </p>
             </div>
          </div>
          <div class="col-md-7">
            <div class="about_img">
               <figure><img src="uploads/aboutdatas/{{$item->image}}" alt="#"/></figure>
            </div>
         </div>
          <div class="col-md-12">
            <p>{{$item->detail}}</p>
          </div>

       </div>
    </div>
 </div>
 <!-- end about -->

@endsection
