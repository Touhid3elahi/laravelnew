@extends('welcome')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>

                    <a href="{{route('all.post')}}" class="btn btn-outline-info">all post</a>
                </p>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>post title</label>
                            <input type="text" class="form-control" value="{{$post->title}}" name="title" required>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>category</label>

                            <select class="form-control" name="category_id">
                                @foreach($category as $row)
                                    <option value="{{$row->id}}" <?php if($row->id==$post->category_id) echo "selected";?>>{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 ">
                            <label>New Image</label>
                            <input type="file" class="form-control" name="image"><br>
                         old image: <img src="{{URL::to($post->image)}}" style="height: 40px; width: 70px; ">
                            <input type="hidden" name="old_image" value="{{$post->image}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <label>post detail</label>
                            <textarea rows="5" class="form-control"  required name="details">{{$post->details}}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
