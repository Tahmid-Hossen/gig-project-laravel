@extends('welcome')
@section('content')
<p>
 <a href="{{ Route('add.category') }}" class="btn btn-danger mt-5">Add Category</a>
 <a href="{{ Route('all.category') }}" class="btn btn-success mt-5">All Category</a>
</p>
<hr>
<div>
  <ol>
   <li>Category ID: {{ $cat->id }} </li>
   <li>Category Name: {{ $cat->name }} </li>
   <li>Category Slug: {{ $cat->slug }} </li>
  </ol>
</div>
@endsection