@extends('welcome')
@section('content')
<p>
 <a href="{{ Route('add.category') }}" class="btn btn-danger mt-5">Add Category</a>
 <a href="{{ Route('all.category') }}" class="btn btn-success mt-5">All Category</a>
 <a href="{{ Route('all.post') }}" class="btn btn-success mt-5">All Post</a>
</p>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
     @csrf
    <div class="form-group">
      <label for="exampleFormControlFile1">Enter the title here</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Post Category</label>
      <select class="form-control" name="category_id">
        @foreach($category as $row)
        <option value="{{ $row->id }}">{{ $row->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
     <label for="comment">Write Post:</label>
     <textarea class="form-control" rows="5" name="details"></textarea>
    </div>
   <div class="form-group">
     <label for="exampleFormControlFile1">Upload your images</label>
     <input type="file" class="form-control-file" name="image" require>
   </div>
   <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
</form>
@endsection