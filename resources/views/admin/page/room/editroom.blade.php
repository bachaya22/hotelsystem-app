<!-- resources/views/rooms/edit.blade.php -->

@extends('admin.layouts.master')

@section('content')
    <h2>Edit Room</h2>

    <form action="{{ url('roomupdate',$room->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}

        <div>
            <label>Room Title:</label>
            <input type="text" name="roomtitle" value="{{  $room->roomtitle}}">
        </div>

        <div>

        <label for="roomtype">Room Type:</label>
        <select name="type">
            <option selected value="{{  $room->roomtype}}">{{  $room->roomtype}}</option>

            <option value="regular">Regular</option>
            <option value="deluxe">Deluxe</option>
            <option value="premium">Preium</option>
        </select>
        </div>

        <div>
            <label>Price:</label>
            <input type="text" name="price" value="{{  $room->price }}">
        </div>

        <div>
            <label>Description:</label>
            <textarea name="descrption">{{  $room->descrption}}</textarea>
        </div>

        <div>
            <label>WiFi:</label>
            <select name="wifi">
            <option selected value="{{  $room->wifi}}">{{  $room->wifi}}</option>

                <option value="yes" {{ $room->wifi == 'yes' ? 'selected' : '' }}>Yes</option>
                <option value="no" {{ $room->wifi == 'no' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div>
            <label>Current Image:</label>

                <img src="/room/{{$room->image}}" alt="Room Image" width="150">

        </div>

        <div>
            <label>Upload New Image:</label>
            <input type="file" name="image">
        </div>

        <div>
            <button type="submit">Update Room</button>
        </div>
    </form>
@endsection
