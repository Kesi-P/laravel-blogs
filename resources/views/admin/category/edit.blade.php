@extends('layouts.app')

@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      Update Category

    </div>
    <div class="panel-body">
      <form action="{{ route('category.update', ['id'=>$category->id])}}" method="post" >
        {{ csrf_field()}}

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name='name'  value="{{ $category->name }}">
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">
            Update Category
          </button>

        </div>
      </form>
    </div>
  </div>
@endsection
