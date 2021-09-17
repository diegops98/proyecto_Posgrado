@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Informacion de los alumnos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-alumnos')
                                <a class="btn btn-warning" href="{{ route('alumnos.create') }}">Crear Nuevo Alumno</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                <th style="display: none">ID</th>
                                <th style="color: #fff;">Nombre</th>
                                <th style="color: #fff;">Apellidos</th>
                                <th style="color: #fff;">N.Control</th>
                                <th style="color: #fff;">Titulo proyecto</th>
                                <th style="color: #fff;">Telefono</th>
                                <th style="color: white;">Acciones</th>
                                </thead>
                                <tbody>
                                @foreach($alumnos as $alumno)
                                    <tr>
                                        <td style="display: none">{{$alumno->id}}</td>
                                        <td>{{$alumno->nombre}}</td>
                                        <td>{{$alumno->apellidos}}</td>
                                        <td>{{$alumno->nControl}}</td>
                                        <td>{{$alumno->titulo}}</td>
                                        <td>{{$alumno->telefono}}</td>
                                        <td>

                                                @can('editar-alumnos')
                                                <a class="btn btn-info" href="{{route('alumnos.edit', $alumno->id)}}">Editar</a>
                                                @endcan

                                                @csrf

                                                @can('borrar-alumnos')
                                                    {!! Form::open(['method'=>'DELETE','route'=>['alumnos.destroy',$alumno->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar',['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            <!--</form>-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--Centramos la paginacion a la derecha-->
                            <div class="pagination justify-content-end">
                                {!! $alumnos->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

