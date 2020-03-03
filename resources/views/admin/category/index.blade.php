@extends('layouts.app')

@section('content')
  <table class="table table-hover">
    <thead>
      <th>Category name</th>
      <th>Editting </th>
      <th>Deleting</th>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td> {{ $category->name}}</td>
        <td>  <a href="{{route('category.edit', ['id'=>$category->id] )}}" type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Editting</a></td>
        <td><a href="{{route('category.delete', ['id'=>$category->id] )}}" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span>Deleting</a></td>
      </tr>

      @endforeach
    </tbody>
  </table>
@stop
