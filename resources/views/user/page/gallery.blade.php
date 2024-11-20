@extends('user.layouts.master')
@section('content')


      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                    <h2>gallery</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- gallery -->
      <div  class="gallery">
         <div class="container">

            <div class="row">
                @foreach ($gallery as $gallery )


                <div class="col-md-3 col-sm-6">
                   <div class="gallery_img">
                      <figure><img src="/gallery/{{$gallery->image}}" alt="#"/></figure>
                   </div>
                </div>
                @endforeach
             
            </div>
         </div>
      </div>
      <!-- end gallery -->

      <!--  footer -->
      @endsection
