@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        Registrar Tareas
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Tarea a registrar</h5>
                        <p class="card-text">El fin de esta herramienta es brindarte una pequeña ayuda para administrar
                            tus tiempos</p>
                        <form action="{{route('actividades.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre de la actividad:</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name="nombre"
                                               aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Asigna un nombre a la
                                            actividad</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hora de inicio:</label>
                                        <input type="time" class="form-control" id="exampleInputEmail1" name="horaInicio"
                                               aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Asigna una hora de inicio a
                                            la
                                            actividad</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">Hora de fin:</label>
                                        <input type="time" class="form-control" id="exampleInputEmail1" name="horaFin"
                                               aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Asigna una hora de
                                            finalización a la
                                            actividad</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">Día:</label>
                                        <select class="form-control" name="dias_id" id="">
                                            <option value="">Seleccione el dia...</option>
                                            @foreach($dias as $dia)
                                                <option value="{{$dia->id}}">{{$dia->dia}}</option>
                                            @endforeach
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Asigna un día a la
                                            actividad</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripción de la actividad</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion"
                                                  rows="3"></textarea>
                                        <small id="emailHelp" class="form-text text-muted">Asigna una descripción a la
                                            actividad</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check mt-1">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        ¡Somos lo que hacemos!
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card text-center">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre Actividad</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Hora Inicio</th>
                            <th scope="col">Hora Fin</th>
                            <th scope="col">Día</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($actividades as $actividad)
                            <tr>
                                <th scope="row">{{$actividad->id}}</th>
                                <td>{{$actividad->nombre}}</td>
                                <td>{{$actividad->descripcion}}</td>
                                @if($actividad->horaInicio < '12:00')
                                    <td>{{$actividad->horaInicio}} am</td>
                                @else
                                    <td>{{$actividad->horaInicio}} pm</td>
                                @endif
                                @if($actividad->horaFin < '12:00')
                                    <td>{{$actividad->horaFin}} am</td>
                                @else
                                    <td>{{$actividad->horaFin}} pm</td>
                                @endif
                                <td>{{$actividad->diasRel[0]->dia}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
