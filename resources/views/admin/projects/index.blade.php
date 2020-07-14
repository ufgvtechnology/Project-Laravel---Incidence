@extends('layouts.app')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bienvenido - Sistema de incidencias
                </div>
                <div class="panel-body">

                    @if(session('notification'))
                        <div  class="alert alert-success">
                            {{session('notification')}}
                        </div>
                    @endif



                    @if(count($errors) >0)
                        <div class="alert aler-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="" method="POST">

                        {{csrf_field()}}
                      
                         <div class="form-group">
                            <label for="name">Nombre</label>
                             <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                         <div class="form-group">
                            <label for="description">Descripción</label>
                             <input type="text" name="description" class="form-control" value="{{old('description')}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="start">Fecha de inicio</label>
                            <input type="date" name="start" class="form-control" value="{{ old('start')}}">
                        </div>
                      
                        <div class="form-group">
                            <button class="btn btn-primary">Registrar proyecto</button>
                        </div>

                    </form>

                    <table class="table table-bordered">
                        
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha de inicio</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr>
                                <td>{{$project->name}}</td>
                                <td>{{$project->description}}</td>
                                <td>{{$project->start ?: 'No se indico fecha de inicio'}}</td>
                                <td>
                                    <a href="/proyecto/{{$project->id}}" class="btn btn-primary " title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                @if($project->trashed())
                                    <a href="/proyecto/{{$project->id}}/restaurar" class="btn btn-warning" title="Restaurar">
                                            <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                @else
                                    <a href="/proyecto/{{$project->id}}/eliminar" class="btn btn-danger" title="Dar de baja">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                        
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
@endsection