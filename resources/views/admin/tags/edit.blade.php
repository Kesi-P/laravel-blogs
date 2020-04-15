@extends('layouts.app')

@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      Update Tag

    </div>
    <div class="panel-body">
      <form action="{{ route('tag.update', ['id'=>$tag->id])}}" method="post" >
        {{ csrf_field()}}

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name='tag'  value="{{ $tag->tag }}">
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Update Tag
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
