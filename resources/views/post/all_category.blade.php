@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">

                    <a href="{{route('add.category')}}" class="btn btn-outline-danger">Add category</a>
                    <a href="{{route('all.category')}}" class="btn btn-outline-info">all category</a>

                <hr>
               <table class="table table-responsive">
                   <tr>
                       <th>SL</th>
                       <th>Category Name</th>
                       <th>Slug name</th>
                       <th>created at</th>
                       <th>Action</th>
                   </tr>
                   @foreach ($category as $row)
                   <tr>
                       <td>{{$row->id}}</td>
                       <td>{{$row->name}}</td>
                       <td>{{$row->slug}}</td>
                       <td>{{$row->created_at}}</td>

                       <td>
                           <a href="{{ URL::to('edit/category/'.$row->id)}}" class="btn btn-outline-success">Edit</a>
                           <a href="{{ URL::to('view/category/'.$row->id)}}" class="btn btn-outline-info">View</a>
                           <a href="{{ URL::to('delete/category/'.$row->id)}}" class="btn btn-outline-danger" id="delete">Delete</a>
                       </td>
                   </tr>
                   @endforeach
               </table>


            </div>
        </div>
    </div>
@endsection
