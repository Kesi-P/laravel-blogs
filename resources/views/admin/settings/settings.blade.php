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
      Edit blog settings

    </div>
    <div class="panel-body">
      <form action="{{ route('settings.update')}}" method="post">
        {{ csrf_field()}}

        <div class="form-group">
          <label for="title">Site Name</label>
          <input type="text" class="form-control" id="site_name" name='site_name' value="{{ $settings->site_name}}">
        </div>
        <div class="form-group">
          <label for="title">Address</label>
          <input type="text" class="form-control" id="address" name='address' value="{{ $settings->address}}">
        </div>
        <div class="form-group">
          <label for="title">Phone</label>
          <input type="text" class="form-control" id="contact_number" name='contact_number' value="{{ $settings->contact_number}}">
        </div>
        <div class="form-group">
          <label for="title">Email</label>
          <input type="email" class="form-control" id="contact_email" name='contact_email' value="{{ $settings->contact_email }}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Save Settings
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
