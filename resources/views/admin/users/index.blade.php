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
        <td> Permis</td>

        <td><span class="glyphicon glyphicon-trash"></span>Trash</td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
