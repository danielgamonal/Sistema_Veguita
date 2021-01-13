<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>@yield('title') - Veguita</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="routeName" content="{{ Route::currentRouteName() }}">
      
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
      <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

      <script src="https://kit.fontawesome.com/c3dc98b95a.js" crossorigin="anonymous"></script>
      <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
      @stack('boton_imagen')
   </head>
   <body>
      <div class="wrapper">
         <div class="col1">@include('admin.sidebar')</div>
         <div class="col2">

            <div class="page">
               <div class="container-fluid">
                  <nav aria-label="breadcrumb shadow">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                           <a href="{{url('/admin')}}"><i class="fas fa-home"></i> Inicio</a>
                        </li>
                        @section('breadcrumb')
                        @show
                     </ol>
                  </nav>
               </div>
               {{-- Alerta --}}
               @if (Session::has('message'))
               <div class="container-fluid">
                  <div class="alert alert-{{ Session::get('typealert')}} mtop16" style="display: block; margin-bottom: 16px;">
                     {{Session::get('message')}}
                     @if ($errors->any())
                     <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                     </ul>
                     @endif
                     <script>
                        $('.alert').slideDown();
                        setTimeout(function(){ $('alert').slideUp(); }10000)
                     </script>
                  </div>
               </div>
               @endif
               @section('content')
               @show
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function(){
             $('[data-toggle="tooltip"]').tooltip()
         });
      </script>
   </body>
</html>