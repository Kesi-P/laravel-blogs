@extends('layouts.app')

@section('content')

<!-- display error -->
<!-- @if(count($errors) >0 )
  <ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item text-danger">{{ $error}}</li>
    @endforeach
  </ul>
@endif -->
  <div class="panel panel-default">
    <div class="panel-heading">
      Create Tag

    </div>
    <div class="panel-body">
      <form action="{{ route('tag.store')}}" method="post" >
        {{ csrf_field()}}

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name='tag'>
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Save Tag
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
