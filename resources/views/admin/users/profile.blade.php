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
      Edit your profile

    </div>
    <div class="panel-body">
      <form action="{{ route('user.profile.update')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}

        <div class="form-group">
          <label for="title">Name</label>
          <input type="text" class="form-control" id="name" name='name' value="{{ $user->name}}">
        </div>
        <div class="form-group">
          <label for="title">Email</label>
          <input type="email" class="form-control" id="email" name='email' value="{{ $user->email}}">
        </div>
        <div class="form-group">
          <label for="title">New Password</label>
          <input type="password" class="form-control" id="password" name='password'>
        </div>
        <div class="form-group">
          <label for="title">Avatar</label>
          <input type="file" class="form-control" id="avatar" name='avatar'>
        </div>
        <div class="form-group">
          <label for="title">Facebook</label>
          <input type="text" class="form-control" id="facebook" name='facebook' value="{{ $user->profile->facebook}}">
        </div>
        <div class="form-group">
          <label for="title">Instragram</label>
          <input type="text" class="form-control" id="instragram" name='instragram' value="{{ $user->profile->instragram}}">
        </div>
        <div class="form-group">
         <label for="content">About you</label>
         <textarea class="form-control" id="about" rows="3" name="about" > {{ $user->profile->about}} </textarea>
       </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Update Profile
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
