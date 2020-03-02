@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      Create Post

    </div>
    <div class="panel-body">
      <form action="{{ route('post.store')}}" method="post">
        <!-- check that the form comw from only this form -->
        {{ csrf_field()}}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name='title'>
        </div>
        <div class="form-group">
          <label for="featured">Featured Image</label>
          <input type="file" class="form-control" id="featured" name='featured'>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Example select</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
         <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Save Post
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
