@extends('layouts.app')

@section('content')
  <table class="table table-hover">
    <thead>
      <th>Image</th>
      <th>Name</th>
      <th>Permission </th>
      <th>Delete</th>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td><img src="{{ asset($user->profile->avatar) }}" alt="" width="50px" height="50px"></td>
        <td> {{ $user->name}}</td>
        <td>
          @if($user->admin)
            <a href="{{ route('user.sub', $user->id)}}" class="btn btn-xs btn-success">Admin</a>
          @else
            <a href="{{ route('user.admin', $user->id)}}" class="btn btn-xs btn-primary">Subscribe</a>
          @endif
        </td>

        <td>
          @if(Auth::id() !== $user->id)
          <a href="{{ route('user.destroy',$user->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"> </span>Delete</a>
          @endif
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
