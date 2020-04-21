@extends('welcome')
@section('content')
<p>
 <a href="{{ Route('add.category') }}" class="btn btn-danger mt-5">Add Category</a>
 <a href="{{ Route('all.category') }}" class="btn btn-success mt-5">All Category</a>
</p>
<hr>
<table class="table table-responsive"> 
<tr>
  <th>SL</th>
  <th>Name</th>
  <th>Slug</th>
  <th>Action</th>
</tr>
 @foreach($category as $row)
 <tr>
  <td>{{ $row->id }}</td>
  <td>{{ $row->name }}</td>
  <td>{{ $row->slug }}</td>
  <td>
  <a href=" {{ URL::to('edit/category/' .$row->id) }} " class="btn btn-sm btn-info">Edit</a>
  <a href=" {{ URL::to('delete/category/' .$row->id) }} " class="btn btn-sm btn-danger delete">Delete</a>
  <a href="{{ URL::to('view/category/' .$row->id) }}" class="btn btn-sm btn-success">view</a>
  </td>
 </tr>
  @endforeach
</table>
@endsection