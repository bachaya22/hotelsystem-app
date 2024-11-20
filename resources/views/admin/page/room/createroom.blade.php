@extends('admin.layouts.master')

@section('content')
    <h1>Create New Room</h1>

    <form action="{{ url('rooms.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="roomtitle">Room Title:</label>
        <input type="text" name="roomtitle" >
        <br>

        <label for="roomtype">Room Type:</label>
        <select name="type">
            <option value="regular">Regular</option>
            <option value="deluxe">Deluxe</option>
            <option value="premium">Preium</option>
        </select>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price"><br>
        <label for="wifi">WiFi:</label>
        <select name="wifi" id="wifi">
            <option value="yes" >Yes</option>
            <option value="no">No</option>
        </select><br>
        <label for="descrption">Description:</label> <!-- check if typo intended -->
        <textarea name="descrption"> </textarea><br>
         <label for="image">Image URL:</label>
        <input type="file" name="image" ><br>
        <button type="submit">Create Room</button>
    </form>
@endsection
