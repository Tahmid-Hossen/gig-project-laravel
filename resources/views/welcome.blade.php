<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<div class="container">
  <div class="row">
   <div class="col-12">
      <div class="menu">
        <ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ Route('about') }}">About us</a></li>
          <li><a href="{{ Route('service') }}">Service</a></li>
          <li><a href="{{ Route('blog.post') }}">Blog</a></li>
          <li><a href="{{ Route('contact') }}">Contact Us</a></li>
        </ul>
        <div class="registration">
          <li><a href="" class="regi">Registration</a></li>
          <li><a href="" class="regi">Login</a></li>
          <li><a href="{{ Route('write.post') }}" class="regi">create your blog</a></li>
        </div>
      </div>
   </div>
  </div>
  @yield('content')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script>
    $('.delete').on('click', function () {
        // return confirm('Are you sure want to delete?');
        event.preventDefault();//this will hold the url
        swal({
            title: "Are you sure?",
            text: "Once clicked, this will be softdeleted!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Done! category has been softdeleted!", {
                    icon: "success",
                    button: false,
                });
            location.reload(true);//this will release the event
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
</script> -->

</body>
</html>