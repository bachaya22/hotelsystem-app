@extends('admin.layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit aboutdata with IMAGE
                        <a href="{{ url('aboutdatas') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-aboutdata/'.$aboutdata->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">aboutdata title</label>
                            <input type="text" name="title" value="{{$aboutdata->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata description</label>
                            <input type="text" name="description" value="{{$aboutdata->description}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata detail</label>
                            <input type="text" name="detail" value="{{$aboutdata->detail}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/aboutdatas/'.$aboutdata->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update aboutdata</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
