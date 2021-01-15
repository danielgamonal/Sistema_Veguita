@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
{{-- directorio --}}
<li class="breadcrumb-item">
    <a href="{{url('/admin/users')}}"><i class="fas fa-user-friends"></i>Usuarios</a>
</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fas fa-user-friends"></i>Usuarios</h2>
            </div>
            <div class="inside">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Correo Electronico</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="opts">
                                <a href="{{url('/admin/user/'.$user->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Ver Usuario"><i class="fas fa-edit"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection