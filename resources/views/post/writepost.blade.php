@extends('welcome')
@section('content')
 <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>
            <a href="{{route('add.category')}}" class="btn btn-outline-danger">Add category</a>
            <a href="{{route('all.category')}}" class="btn btn-outline-info">all category</a>
            <a href="{{route('all.post')}}" class="btn btn-outline-info">all post</a>
        </p>
          <hr>
          <h3>Write Post</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>post title</label>
              <input type="text" class="form-control" placeholder="Title" name="title" required>
              <p class="help-block text-danger"></p>
            </div>
          </div>
            <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>category</label>

                <select class="form-control" name="category_id">
                  @foreach($category as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>image</label>
              <input type="file" class="form-control" required name="image">

            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>post detail</label>
              <textarea rows="5" class="form-control" placeholder="Details" id="message" required name="details"></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
  </div>
@endsection
