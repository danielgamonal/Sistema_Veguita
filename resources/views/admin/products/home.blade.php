@extends('admin.master')
@section('title', 'Productos')
@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
    <a href="{{url('/admin/products')}}"><i class="fas fa-boxes"></i> Productos </a>
</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-boxes"></i> Productos </h2>
            </div>
            <div class="inside">
                <div class="btns">
                    <a href="{{url('/admin/product/add')}}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>Agregar Producto
                    </a>
                </div>
                <table class="table table-striped mtop16">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td></td>
                            <td>Nombre</td>
                            <td>Categoria</td>
                            <td>Precio</td>
                            <td>Cantidad/Kilos</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td><img src="{{ url('uploads/'.$p->file_path.'/t_'.$p->image) }}" width="64"></td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->cat->name}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->quantity}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection