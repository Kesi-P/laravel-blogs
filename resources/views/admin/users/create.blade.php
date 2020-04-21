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
      Create User

    </div>
    <div class="panel-body">
      <form action="{{ route('user.store')}}" method="post">
        {{ csrf_field()}}

        <div class="form-group">
          <label for="title">Name</label>
          <input type="text" class="form-control" id="name" name='name'>
        </div>
        <div class="form-group">
          <label for="title">Email</label>
          <input type="email" class="form-control" id="email" name='email'>
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
