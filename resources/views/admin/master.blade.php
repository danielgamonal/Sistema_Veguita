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
      <link rel="stylesheet" href="{{ url('/static/css/admin.css?v='.time()) }}">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/c3dc98b95a.js" crossorigin="anonymous"></script>
      <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script> 
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
   </body>
</html>