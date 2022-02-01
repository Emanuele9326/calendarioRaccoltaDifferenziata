<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Calendario Raccolta Differenziata</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('./css/style.css')}}">
        <!--JS-->
        <script src="{{asset('./js/add_row.js')}}"></script>
    </head>
    <body>
        <ul class="nav justify-content-center navbar-dark bg-dark ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{url('/')}}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('resource')}}">CREA CALENDARIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('weekly')}}">CALENDARIO SETTIMANALE</a>
            </li>
          </ul>
        <div class="section  text-center mt-5">
         @yield('section') 
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>
    </body>
</html>
