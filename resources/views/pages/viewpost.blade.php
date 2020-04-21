@extends('welcome')
@section('content')
<div class="header-section">
  <div class="text">
   <h1>Blog Page</h1>
  </div>
</div>


<div>

   <p>Category name: {{ $post->name }} </p>
   <h3>{{ $post->title }}</h3>
   <img src="{{ URL::to($post->image) }}" alt="" style="height:340px;">
   <p>{{ $post->details}}</p>

</div>

@endsection