@extends('admin.layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('message'))
                <h6 class="alert alert-success">{{ session('message') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add about with IMAGE
                        <a href="{{ url('aboutdatas') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('add-aboutdata') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">aboutdata title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata detail</label>
                            <input type="text" name="detail" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">aboutdata  Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save aboutdata</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
