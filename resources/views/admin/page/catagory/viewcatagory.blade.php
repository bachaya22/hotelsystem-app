@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <div>
                Add Catagory
            </div>
            <form action="{{url('addcatagory')}}" method="POST">
                @csrf
                <input type="text" name="catagory_name" placeholder="add catagory" >
                <input type="submit" class="btn btn-primary" name="submit" value="addcatagory">
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <tr>
                    <td class="fs-5" > Catogery name</td>
                    <td class="fs-5">action</td>
                </tr>
                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->catagory_name}}</td>
                        <td>
                            <a href="{{url('delete_catagory' ,$data->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this')">delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
