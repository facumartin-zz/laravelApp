@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Tareas</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('tasks.create') }}" class="btn btn-info" >Agregar Tarea</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre de tarea</th>
               <th>Prioridad</th>
               <th>Duración </th>
               <th>Proyecto</th>
               <th>pathtoFile</th>
               <th>Modificar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($tasks->count())
              @foreach($tasks as $task)
              <tr>
                <td>{{$task->taskName}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->duration}}</td>
                <td>{{$task->project}}</td>
                <td>{{$task->pathtoFile}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('TasksController@edit', $task->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('TasksController@destroy', $task->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay tareas</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $tasks->links() }}
    </div>
  </div>
</section>

@endsection
