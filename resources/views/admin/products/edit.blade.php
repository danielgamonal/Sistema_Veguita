@extends('admin.master')
@section('title', 'Editar Producto')
@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
   <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i> Productos </a>
</li>
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
<div class="panel shadow">
   <div class="header">
      <h2 class="title"><i class="fas fa-edit"></i>Editar Producto </h2>
   </div>
   <div class="inside">
      {{--  Para el formulario se uso Laravel Collective --}}
      {!! Form::open(['url' => '/admin/product/'.$p->id.'/edit', 'files' => true]) !!}
      <div class="row">
         <div class="col-md-6">
            <label for="name">Nombre del Producto:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::text('name', $p->name, ['class' => 'form-control']) !!}
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
               {!! Form::select('category', $cats, $p->category_id, ['class'=>'custom-select']) !!}
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
               {!! Form::number('price', $p->price, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
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
               {!! Form::number('quantity', $p->quantity, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
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
               {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], $p->in_discount, ['class' => 'custom-select']) !!}
            </div>
         </div>
         <div class="col-md-3">
            <label for="indiscount">Estado:</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::select('status', ['0' => 'Borrador', '1' => 'Publico'], $p->status, ['class' => 'custom-select']) !!}
            </div>
         </div>
         {{-- el valor ingresado se restara al precio --}}
         <div class="col-md-3">
            <label for="discount">Descuento {{-- (Ej: 10% seria 0.10) --}}</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                  <i class="far fa-keyboard"></i>
                  </span>
               </div>
               {!! Form::number('discount', $p->discount, ['class' => 'form-control', 'min' => '0', 'step' => 'any']) !!}
            </div>
         </div>
         <div class="col-md-12">
            <label for="content">Descripción</label>
            {!! Form::textarea('content', $p->content, ['class' => 'form-control']) !!}
            <script>CKEDITOR.replace( 'content' );</script>            
         </div>
         <div class="col-md-12">
            {!! Form::submit('Guardar Producto', ['class' => 'btn btn-success']) !!}
         </div>
         {!! Form::close() !!}
      </div>
   </div>
</div>
</div>
<div class="col-md-3">
    <div class="panel shadow">
        <div class="header">
            <h2 class="title"><i class="fas fa-image"></i>Imagen</h2>
            <div class="inside">
                <img src="{{ url('uploads/'.$p->file_path.'/'.$p->image) }}" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="panel shadow mtop16">
       <div class="header">
          <h2 class="title"><i class="far fa-image"></i>Galeria de Imagenes</h2>
       </div>
       <div class="inside product_gallery">
          {!!Form::open(['url' => '/admin/product/'.$p->id.'/gallery/add', 'files' => true, 'id' => 'form_product_gallery'])!!}
          {!!Form::file('file_image', ['id' => 'product_file_image', 'accept' => 'image/*', 'style' => 'display: none;', 'required'])!!}
          {!!Form::close()!!}

          <div class="btn-submit">
             <a href="#" id="btn_product_file_image"><i class="fas fa-plus"></i></a>


             @push('boton_imagen')
            <script>
            // acá el código JS
            document.addEventListener('DOMContentLoaded', function() {
	         var btn_product_file_image = document.getElementById('btn_product_file_image');
	         var product_file_image = document.getElementById('product_file_image');
	         btn_product_file_image.addEventListener('click', function() {
		      product_file_image.click();
	         })

            product_file_image.addEventListener('change', function(){
               document.getElementById('form_product_gallery').submit();
            });
            });
           </script>
           @endpush
          </div>
          <div class="thumbs">
             @foreach ($p->getGallery as $img)
                 <div class="thumb">
                    <a href="{{url('/admin/product/'.$p->id.'/gallery/'.$img->id.'/delete')}}" data-toogle="tooltip" data-placement="top" title="fas fa-trash-alt">
                  <i class="fas fa-trash-alt"></i>
                  </a>
                  <img src="{{url('uploads/'.$img->file_path.'/t_'.$img->file_name)}}">
                 </div>
             @endforeach
          </div>
       </div>
    </div>
</div>
</div>
</div>
@endsection