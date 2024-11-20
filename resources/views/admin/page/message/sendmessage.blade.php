@extends('admin.layouts.master')

@section('content')
   <h1>
    mail sent to {{ $data->name }}
   </h1>
   <form action="{{ url('mail',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">greating</label>
    <input type="text" name="greating" >
    <br>

    <label for="">nobady</label>
    <textarea name="body" ></textarea>

    <br>
    <label for="">phone</label>
    <input type="number" name="phone" >
<div>
    <label for="">action text</label>
    <input type="text" name="actiontext">
</div>
<div>
    <label for="">Action url</label>
    <input type="text" name="actionurl">
</div>
<div>
    <label for="">end line</label>
    <input type="text" name="endline" id="">
</div>



    <button type="submit" class="Btn btn-primary" value="send mail">send</button>
</form>

@endsection
