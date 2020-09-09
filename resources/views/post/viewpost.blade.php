@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">


                <div>
                    <ol>

                        <h3>{{ $post->title }}</h3>
                        <img src="{{ URL::to($post->image) }}" height="340px;">
                        <p>Category Name : {{ $post->name }} </p>
                        <p>{{ $post->details }}</p>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection
