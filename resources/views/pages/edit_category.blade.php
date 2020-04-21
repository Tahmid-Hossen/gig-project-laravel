@extends('welcome')
@section('content')
<p>
 <a href="{{ Route('add.category') }}" class="btn btn-danger mt-5">Add Category</a>
 <a href="{{ Route('all.category') }}" class="btn btn-success mt-5">All Category</a>
</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url('update/category', $category->id) }}" method="POST">
@csrf
    <div class="form-group">
      <label for="exampleFormControlFile1">Category Name</label>
      <input type="text" class="form-control" name="name" value=" {{ $category->name }} ">
    </div>

    <div class="form-group">
      <label for="exampleFormControlFile1">Slug</label>
      <input type="text" class="form-control" name="slug" value=" {{ $category->slug }} ">
    </div>

   <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
</form>
@endsection