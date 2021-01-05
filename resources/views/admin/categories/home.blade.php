@extends('admin.master')
@section('title', 'Categorias')
@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
   <a href="{{url('/admin/categories')}}"><i class="far fa-folder-open"></i> categorias </a>
</li>
@endsection
<!-- ljkhjijhjh -->
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
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
                            {!! Form::select('module', getModulesArray(), 0, ['class'=>'custom-select']) !!}
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

            <div class="col-md-9">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="far fa-folder-open"></i> categorias</h2>
                    </div>
                    <div class="inside">
                        <nav class="nav nav-pills nav-fill">
                            @foreach(getModulesArray() as $m => $k)
                                <a class="nav-link" href="{{ url('/admin/categories/'.$m)}}"><i class="fas fa-list"></i>{{ $k }}</a>
                            @endforeach
                        </nav>
                        <table class="table mtop16">
                            <thead>
                                <tr>
                                    <td width="32"></td>
                                    <td>Nombre</td>
                                    <td width="140"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cats as $cat)
                                    <tr>
                                        <td>{!! htmlspecialchars_decode($cat->icono)!!}</td>
                                        <td>{{$cat->name}}</td>
                                        <td>
                                            <div class="opts">
                                                <a href="{{url('/admin/category/'.$cat->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-edit"></i></a>
                                                <a href="{{url('/admin/category/'.$cat->id.'/delete') }}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection