@extends('admin.layouts.master')

@section('content')
    <h2>All books</h2>

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
            <th>status</th>

            <th>Start Date</th>
            <th>End Date</th>
            <th>room title</th>
            <th>room price</th>
            <th>room image</th>




            <th>delete</th>
            <th>ROOM Status</th>

        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->email }}</td>
                <td>{{ $book->phone }}</td>
                <td>
                    @if($book->status=='approve')
                    <Span style="color:red">Approve</Span>

                    @endif
                    @if ($book->status=='reject')
                    <Span style="color:green">Reject</Span>
                   
                    @endif
                      @if ($book->status=='waiting')
                          <span style="color:blue">waiting</span>
                      @endif
                </td>

                <td>{{ $book->start_date }}</td>
                <td>{{ $book->end_date }}</td>
                <td>{{ $book->room->roomtitle }}</td>
                <td>{{ $book->room->price }}</td>
                <td><img src="/room/{{ $book->room->image }}" width="50px" height="40px" alt="">
                    </td>


                <td>
                    <a href="{{url('deletebook',$book->id)}}" onclick="return confirm('are you sure to delete this')" class="btn btn-danger">Delete</a>
                </td>
                <td>
                    <a href="{{url('approvebook',$book->id)}}" class="btn btn-primary mb-2">Approve</a>
                    <a href="{{url('rejectbook',$book->id)}}" class="btn btn-secondary">Reject</a>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
