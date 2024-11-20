@extends('user.layouts.master')
@section('content')



<section class="banner_main">
    <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
       <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
          <div class="carousel-item active">
             <img class="first-slide" src="{{asset('user/images/banner1.jpg')}}" alt="First slide">
             <div class="container">
             </div>
          </div>
          <div class="carousel-item">
             <img class="second-slide" src="{{asset('user/images/banner2.jpg')}}" alt="Second slide">
          </div>
          <div class="carousel-item">
             <img class="third-slide" src="{{asset('user/images/banner3.jpg')}}" alt="Third slide">
          </div>
       </div>
       <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
       </a>
    </div>
    <div class="booking_ocline">
       <div class="container">
          <div class="row">
             <div class="col-md-5">
                <div class="book_room">
                   <h1>Book a Room Online</h1>
                   <form class="book_now">
                      <div class="row">
                         <div class="col-md-12">
                            <span>Arrival</span>
                            <img class="date_cua" src="{{asset('user/images/date.png')}}">
                            <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                         </div>
                         <div class="col-md-12">
                            <span>Departure</span>
                            <img class="date_cua" src="{{asset('user/images/date.png')}}">
                            <input class="online_book" placeholder="dd/mm/yyyy" type="date" name="dd/mm/yyyy">
                         </div>
                         <div class="col-md-12 text-center">
                           <a href="{{url('ourroom')}}" class="btn btn-danger ">Book room</a>
                         </div>
                      </div>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end banner -->
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
 <!-- gallery -->
 <div  class="gallery">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>gallery</h2>
             </div>
          </div>
       </div>
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
 <!-- blog -->
 <section class="product_section py-5">
    <div class="container">
        <div class="titlepage">
            <h2>Food</h2>
         </div>
      <div class="row">
        @foreach ($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="box card shadow-sm h-100 position-relative">
              <div class="img-box ms-2">
                <img src="productimage/{{$products->image}}" alt="" class="img-fluid">
                <div class=" text-center">
                  <a href="{{ url('product_details', $products->id) }}" class="btn btn-primary text-center mt-1 mb-3 ">
                    <h1 class="text-black">Product Description</h1>
                  </a>
                  <form action="{{ url('add_card', $products->id) }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                      <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 80px;">
                      <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="detail-box text-center p-3">
                <h5 class="mb-2">{{ $products->title }}</h5>
                @if ($products->discountprice !== null)
                <h6 class="text-danger">
                  Discount Price: ${{ $products->discountprice }}
                </h6>
                <h6 class="text-muted text-decoration-line-through">
                  Original Price: ${{ $products->price }}
                </h6>
                @else
                <h6 class="text-primary">
                  Price: ${{ $products->price }}
                </h6>
                @endif
              </div>
            </div>
          </div>

        @endforeach
      </div>
      {{-- <div class="d-flex justify-content-center mt-4">
        {!! $product->links() !!}
      </div> --}}
    </div>
  </section>

 <!-- end blog -->
 <!--  contact -->
 <div class="contact">
    <div class="container">
       <div class="row">
          <div class="col-md-6">
             <form id="request" class="main_form" action="{{url('contactform')}}" method="POST">
               @csrf
               <div class="row">
                   <div class="col-md-12 ">
                      <input class="contactus" placeholder="Name" type="type" name="name" @if(Auth::id())
                      value="{{Auth::user()->name}}"
                      @endif required>
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Email" type="type" name="email" @if(Auth::id())
                      value="{{Auth::user()->email}}"
                      @endif required>
                   </div>
                   <div class="col-md-12">
                      <input class="contactus" placeholder="Phone Number" type="type" name="phone"
                      @if(Auth::id())
                      value="{{Auth::user()->phone}}"
                      @endif required>
                   </div>
                   <div class="col-md-12">
                      <textarea class="textarea" placeholder="Message" type="type" name="message" required>Message</textarea>
                   </div>
                   <div class="col-md-12">
                      <button class="send_btn">Send</button>
                   </div>
                </div>
             </form>
          </div>
          <div class="col-md-6">
             <div class="map_main">
                <div class="map-responsive">
                   <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end contact -->
 <!--  footer -->
 @endsection
