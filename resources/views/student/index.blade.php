@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                <a href="{{URL::to('student/create ')}}" class="btn btn-outline-danger">ADD Student</a>


                <hr>
                <table class="table table-responsive">
                    <tr>
                        <th>SL</th>
                        <th>Student Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($student as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>

                            <td>
                                <a href="{{ URL::to('student/'.$row->id.'/edit')}}" class="btn btn-outline-success">Edit</a>
                                <a href="{{ URL::to('student/'.$row->id)}}" class="btn btn-outline-info">View</a>
                                <form action="{{url('student/'.$row->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger" type="submit">delete</button>
                                </form>
{{--                                <a href="{{ URL::to('delete/student/'.$row->id)}}" class="btn btn-outline-danger" id="delete">Delete</a>--}}
                            </td>
                        </tr>
                    @endforeach
                </table>


            </div>
        </div>
    </div>
@endsection
