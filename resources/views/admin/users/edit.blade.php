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
                            <label for="email">E-mail</label>
                             <input type="email" name="email" readonly class="form-control" value="{{$user->email}}">
                        </div>
                         <div class="form-group">
                            <label for="name">Nombre</label>
                             <input type="text" name="name" class="form-control" value="{{$user->name}}">
                        </div>
                         <div class="form-group">
                            <label for="password">Contraseña</label><en> Ingresar solo si se requiere actualizar</en>
                             <input type="text" name="password" class="form-control" value="{{old('password')}}">
                        </div>
                       

                      
                        <div class="form-group">
                            <button class="btn btn-primary">Guardar usuario</button>
                        </div>

                    </form>

                     <table class="table table-bordered">
                        
                        <thead>
                            <tr>
                                <th>Proyecto</th>
                                <th>Nivel</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Proyecto A</td>
                                <td>N1</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-sm" title="Dar de baja">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
@endsection