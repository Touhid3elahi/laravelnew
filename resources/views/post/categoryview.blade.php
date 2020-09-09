@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>
                    <a href="{{route('add.category')}}" class="btn btn-outline-danger">Add category</a>
                    <a href="{{route('all.category')}}" class="btn btn-outline-info">all category</a>
                </p>

              <div>
                  <ol>
                      <li>category name:{{ $category->name }} </li>
                      <li>slug name:{{ $category->slug }} </li>
                      <li>created at:{{ $category->created_at }} </li>
                  </ol>
              </div>

            </div>
        </div>
    </div>
@endsection
