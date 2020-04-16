@extends('layouts.app')

@section('content')

<!-- display error -->
@if(count($errors) >0 )
  <ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">{{ $error}}</li>
    @endforeach
  </ul>
@endif
  <div class="panel panel-default">
    <div class="panel-heading">
      Create Post

    </div>
    <div class="panel-body">
      <form action="{{ route('post.update',['id'=> $posts->id])}}" method="post" enctype="multipart/form-data" > <!--for except image-->
        <!-- check that the form comw from only this form -->
        {{ csrf_field()}}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name='title' value="{{$posts->title}}">
        </div>
        <div class="form-group">
          <label for="featured">Featured Image</label>
          <input type="file" class="form-control" id="featured" name='featured'>
        </div>
        <div class="form-group">
          <label for="Category">Category</label>
          <select class="form-control" id="category" name="category_id">
            @foreach( $categories as $category)
            <option value="{{$category->id}}"
              @if($posts->category->id == $category->id)
                selected
              @endif  
              >{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tag">Select Tags</label>
          @foreach ($tags as $tag)
          <div class="checkbox">
            <!-- to recieve more than one tag need to send as an array -->
            <label><input type="checkbox" name="tags[]" value="{{ $tag->id}}"
              @foreach( $posts->tags as $t)
                @if($tag->id == $t->id)
                  checked
                @endif
              @endforeach
              >{{$tag->tag}}</label>
          </div>
          @endforeach

        </div>
         <div class="form-group">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" rows="3" name="content">{{$posts->content}}</textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Update Post
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
