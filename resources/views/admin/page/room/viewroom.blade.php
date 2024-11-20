@extends('admin.layouts.master')

@section('content')
    <!-- resources/views/rooms/index.blade.php -->


    <h2>Rooms</h2>
    <a href="{{ url('createroom') }}">Add New Room</a>
    <table class="table  table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>WiFi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($room as $room)
                <tr>
                    <td>{{ $room->roomtitle }}</td>
                    <td>{{ $room->roomtype }}</td>
                    <td>{{ $room->price }}</td>
                    <td>

                            <img src="room/{{$room->image}}" alt="Room Image" width="100">

                    </td>
                    <td>{{ $room->descrption }}</td>
                    <td>{{ ($room->wifi) }}</td>
                    <td>
                        <a href="{{url('roomdelete' , $room->id)}}"
                            onclick="return confirm('are you want to delete this')"
                             class="btn btn-danger">Delete</a>
                             <a href="{{url('roomedit' , $room->id)}}"
                                class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

