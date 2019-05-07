@extends('layouts.layout')
@section('content')
<div class="row">
	<section class="content">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Error!</strong> Revise los campos obligatorios.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			@if(Session::has('success'))
			<div class="alert alert-info">
				{{Session::get('success')}}
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Nueva tarea</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<form method="POST" action="{{ route('tasks.store') }}"  role="form">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="taskName" id="taskName" class="form-control input-sm" placeholder="Nombre de la tarea">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="priority" id="priority" class="form-control input-sm" placeholder="Prioridad">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="text" name="project" id="project" class="form-control input-sm" placeholder="Proyecto">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
										<input type="text" name="pathtoFile" id="pathtoFile" class="form-control input-sm" placeholder="Ingrese un archivo">
                    <div class="form-group">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="duration" id="duration" class="form-control input-sm" placeholder="Ingrese tiempo estimado">
							</div>
              <div class="form-group">
								<textarea name="comments" class="form-control input-sm" placeholder="Comentarios"></textarea>
							</div>
							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-12">
									<input type="submit"  value="Guardar" class="btn btn-success btn-block">
									<a href="{{ route('tasks.index') }}" class="btn btn-info btn-block" >Atrás</a>
								</div>

							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</section>
	@endsection
