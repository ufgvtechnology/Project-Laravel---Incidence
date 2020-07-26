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
                             <input type="text" name="name" class="form-control" value="{{old('name',$project->name)}}">
                        </div>
                         <div class="form-group">
                            <label for="description">Descripción</label>
                             <input type="text" name="description" class="form-control" value="{{old('description',$project->description)}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="start">Fecha de inicio</label>
                            <input type="date" name="start" class="form-control" value="{{ old('start')}}">
                        </div>
                      
                        <div class="form-group">
                            <button class="btn btn-primary">Guardar proyecto</button>
                        </div>

                    </form>

                    <div class="row">
                        <div class="col-md-6">
                            <p>Categorías</p>
                            <form action="/categorias" method="POST" class="form-inline">
                            {{csrf_field()}}
                                <input type="hidden" name="project_id" value="{{$project->id}}">
                                <div class="form-group">
                                        <input type="text" name="name" placeholder="Ingrese nombre" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Añadir</button>
                                </div>
                            </form>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category-> name}}</td>
                                            <td>
                                                <button type="button" data-category="{{$category->id}}" class="btn btn-primary btn-sm" title="Editar">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                                <a href="/categoria/{{$category->id}}/eliminar" class="btn btn-danger btn-sm" title="Dar de baja">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                         <div class="col-md-6">
                            <p>Niveles</p>
                                 <form action="/niveles" method="POST" class="form-inline">
                                    {{csrf_field()}}
                                        <input type="hidden" name="project_id" value="{{$project->id}}">
                                        <div class="form-group">
                                                <input type="text" name="name" placeholder="Ingrese nivel" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Añadir</button>
                                        </div>
                                </form>
                                <table class="table table-bordered">
                                    
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nivel</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($levels as $key => $level)
                                        <tr>
                                            <td>N{{$key+1}}</td>
                                            <td>{{$level->name}}</td>
                                            <td>
                                                <button type="button" data-level="{{$level->id}}" class="btn btn-primary btn-sm" title="Editar">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                                <a href="/nivel/{{$level->id}}/eliminar" class="btn btn-danger btn-sm" title="Dar de baja">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>


   

@endsection
     <!-- Modal Categorias-->
        <div class="modal fade" id="modalEditCategory" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/categoria/editar" method="POST">
                    {{csrf_field()}}
                        <input name="category_id" id="category_id" type="" value="">
                        <form-group>
                                <label for="name">Nombre de la categoría</label>
                                <input type="text" class="form-control" name="name" id="category_name" value="">
                        </form-group>
                   
              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                      </div>
               </form>
               </div>
            </div>
          </div>
        </div>


        <!-- Modal Niveles-->
        <div class="modal fade" id="modalEditLevel" tabindex="-1" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar nivel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/nivel/editar" method="POST">
                    {{csrf_field()}}
                        <input name="level_id" id="level_id" type="hidden" value="">
                        <form-group>
                                <label for="name">Nombre del nivel</label>
                                <input type="text" class="form-control" name="name" id="level_name" value="">
                        </form-group>
                   
              </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                      </div>
               </form>
            </div>
          </div>
        </div>
@section('scripts')
    <script src="/js/admin/projects/edit.js" type="text/javascript"></script>
@endsection