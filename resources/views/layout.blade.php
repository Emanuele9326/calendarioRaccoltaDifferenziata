<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Raccolta differenziata</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{url()-> asset('./css/style.css')}}">
   <script src="{{url()-> asset('./js/addInput.js')}}"></script>
  
</head>

<body>
   <div class="topnav">
      <a class="active" href="{{url('/')}}">HOME</a>
      <a  href="{{url('viewaddConf')}}">CREA CALENDARIO</a>
      <a href="{{url('collection')}}">CALENDARIO SETTIMANALE</a>
   </div>
   <div class="container">
      @yield('content')
   </div>
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
</body>

</html>