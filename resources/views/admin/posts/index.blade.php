@extends('layouts.app')

@section('content')
  <table class="table table-hover">
    <thead>
      <th>Image</th>
      <th>Title</th>
      <th>Editting </th>
      <th>Deleting</th>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td><img src="{{ $post->featured}}" alt="{{ $post->title}}" width="50px" height="50px"></td>
        <td> {{ $post->title}}</td>
        <td>  <a href="{{route('post.edit', ['id'=>$post->id] )}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Editting</a></td>
        <td><a href="{{route('post.delete', ['id'=>$post->id] )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Trash</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
