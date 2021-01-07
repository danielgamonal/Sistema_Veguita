@extends('admin.master')
@section('title', 'Agregar Producto')
@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
   <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i> Productos </a>
</li>
<li class="breadcrumb-item">
   <a href="{{url('/admin/product/add')}}"><i class="fas fa-plus"></i> Agregar Producto </a>
</li>
@endsection
@section('content')
<div class="container-fluid">
<div class="panel shadow">
   <div class="header">
      <h2 class="title"><i class="fas fa-plus"></i>Agregar Producto </h2>
   </div>
   <div class="inside">
      {{--  Para el formulario se uso Laravel Collective --}}
      {!! Form::open(['url' => '/admin/product/add', 'files' => true]) !!}
      <div class="row">
         <div class="col-md-6">
            <label for="name">Nombre del Producto:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
         </div>
         <div class="col-md-3">
            <label for="name">Categoría:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1">
                       <i class="far fa-keyboard"></i>
                   </span>
               </div>
              {{--  traemos los modulos de categoria desde function.php --}}
               {!! Form::select('category', $cats, 0, ['class'=>'custom-select']) !!}
           </div>
         </div>
         <div class="col-md-3">
            <label for="name">Imagen:</label>
            <div class="custom-file">
               {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile', 'accept' => 'image/*']) !!}
               <label class="custom-file-label" for="customFile">Seleccione el Archivo</label>
            </div>
         </div>
      </div>
      <div class="row mtop16">
         <div class="col-md-3">
            <label for="price">Precio:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
            </div>
         </div>
         <div class="col-md-3">
            <label for="quantity">Cantidad/Kilos:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::number('quantity', null, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
            </div>
         </div>
         <div class="col-md-3">
            <label for="indiscount">En Descuento?</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], '0', ['class' => 'custom-select']) !!}
            </div>
         </div>
         {{-- el valor ingresado se restara al precio --}}
         <div class="col-md-3">
            <label for="discount">Descuento (Ej: 10% seria 0.10)</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::number('discount', 0.00, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
            </div>
         </div>
         <div class="col-md-12">
            <label for="content">Descripción</label>
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            <script>CKEDITOR.replace( 'content' );</script>            
         </div>
         <div class="col-md-12">
            {!! Form::submit('Guardar Producto', ['class' => 'btn btn-success']) !!}
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>
@endsection