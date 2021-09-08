@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="text-center">Control de Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!--Boton crear nuevo usuario-->
                            <a class="btn btn-warning" href="{{  route('usuarios.create')}}">Nuevo Usuario</a>

                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                <!--Tabla en la que se especifica datos que se veran-->
                                <th style="display: none;">ID</th>
                                <th style="color: white">Nombre</th>
                                <th style="color: white">E-mail</th>
                                <th style="color: white">Rol</th>
                                <th style="color: white">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <!--Se llaman los datos de la BD-->
                                        <td style="display: none">{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                            <!--Se llaman los roles-->
                                            @if (!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                    <h5><span class="badge badge-dark">{{$rolName}}}</span></h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        <!--Boton editar-->
                                        <td>
                                            <a class="btn btn-info" href="{{route('usuarios.edit', $usuario->id) }}">Editar</a>
                                            <!--Formulario borrar-->
                                            {!! Form::open(['method'=>'DELETE', 'route'=>['usuarios.destroy', $usuario->id], 'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class'=>'btn btn-danger']) !!}
                                            {!! Form::close()!!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--Paginacion cuando se tienes mas de 5 usuarios-->
                            <div class="pagination justify-contend-end">
                                 {!! $usuarios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
