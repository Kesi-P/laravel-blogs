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
        <td>  <a href="#" type="button" class="btn btn-success">Editting</a></td>
        <td><a href="#" type="button" class="btn btn-warning">Deleting</a></td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
@stop
