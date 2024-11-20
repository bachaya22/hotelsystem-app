@extends('admin.layouts.master')

@section('content')
    <h2>All Message</h2>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table  table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>message</th>
            <th>Send message</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->phone }}</td>
                <td>{{ $data->message }}</td>
                <td><a href="{{url('sendmessage',$data->id)}}" class="btn btn-primary">send mail</a></td>

            </tr>
        @endforeach
    </table>
@endsection
