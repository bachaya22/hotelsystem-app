@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">

            <h1 class="text-center">Gallery</h1>
            @foreach ($gallery as $gallery)
                <div class="col-4 mb-5" >
                    <img src="/gallery/{{ $gallery->image }}" height="200px" width="300px" alt="">
                    <a href="{{url('deleteimage',$gallery->id)}}" onclick="return confirm('are you sure to delete this')" class="btn btn-danger">Delete</a>
                </div>
            @endforeach

    </div>
</div>
 <div class="container mt-5">
    <div class="row">

        <div class="col-lg-12 text-center">

            <form action="{{url('uploadimage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">image</label>
                    <input type="file" name="image">

                    <input type="submit" class="btn btn-primary" value="add image">
                </div>
            </form>
        </div>
    </div>
 </div>


@endsection
