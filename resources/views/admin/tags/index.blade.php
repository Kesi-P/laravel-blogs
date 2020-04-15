@extends('layouts.app')

@section('content')
  <table class="table table-hover">
    <thead>
      <th>Tag name</th>
      <th>Editting </th>
      <th>Deleting</th>
    </thead>
    <tbody>
      @foreach ($tags as $tag)
      <tr>
        <td> {{ $tag->tag}}</td>
        <td>  <a href="{{route('tag.edit', ['id'=>$tag->id] )}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Editting</a></td>
        <td><a href="{{route('tag.delete', ['id'=>$tag->id] )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Deleting</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
