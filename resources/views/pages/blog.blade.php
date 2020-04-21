@extends('welcome')
@section('content')
<div class="header-section">
  <div class="text">
   <h1>Blog Page</h1>
  </div>
</div>

<br>
<div class="row">
@foreach($post as $row)
 <div class="col-sm-4 ">
  <div class="post-preview">
  <a href="{{ URL::to('view/post/' .$row->id) }}">
    <h2 class="post-title"> {{ $row->title }} </h2>
    <img src="{{URL::to($row->image)}}" style="height:300px; width:350px;" alt="">
    </a>
    <p class="post-meta">category
    <a href="#">{{ $row->name }}</a>
    on slug {{ $row -> slug }}</p>
  </div>
 </div>
 @endforeach
</div>

 {{ $post->links() }}

 <div class="clearfix">
  <a href="#" class="btn btn-primary float-right">Older Posts &rarr;</a>
 </div>

@endsection
