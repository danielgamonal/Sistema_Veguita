@extends('admin.master')
@section('title', 'Categorias')
@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
   <a href="{{url('/admin/categories')}}"><i class="far fa-folder-open"></i> categorias </a>
</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fas fa-plus"></i>Agregar Categoria</h2>
                    </div>
                    <div class="inside">
                        {!! Form::open(['url' => '/admin/category/add']) !!}
                        <label for="name">Nombre:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <label for="name" class="mtop16">Modulo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                           {{--  traemos los modulos de categoria desde function.php --}}
                            {!! Form::select('module', getModulesArray(), 0, ['custom-select']) !!}
                        </div>

                        <label for="icon" class="mtop16">Icono:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="far fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                        </div>
                        <div>
                            <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Galeria Iconos</a>.
                        </div>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success mtop16']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection