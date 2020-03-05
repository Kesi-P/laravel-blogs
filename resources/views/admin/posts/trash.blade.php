@extends('layouts.app')

@section('content')
  <table class="table table-hover">
    <thead>
      <th>Image</th>
      <th>Title</th>
      <th>Deleting </th>
      <th>Restore</th>
    </thead>
    <tbody>
      @foreach ($trashes as $trash)
      <tr>
        <td><img src="{{ $trash->featured}}" alt="{{ $trash->title}}" width="50px" height="50px"></td>
        <td> {{ $trash->title}}</td>
        <td>  <a href="{{route('post.kill', ['id'=>$trash->id] )}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Deleting</a></td>
        <td><a href="{{route('post.restore', ['id'=>$trash->id] )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Restore</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
