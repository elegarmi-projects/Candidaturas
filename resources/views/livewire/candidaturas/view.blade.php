@section('title', __('Candidaturas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Candidaturas </h4>
						</div>
						<div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar candidaturas">
						</div>
						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#createDataModal">
						<i class="fa fa-plus"></i> Añadir candidatura
						</div>
						<a href="{{url('/send/email')}}" class="btn btn-sm btn-info"> 
						<i class="fa fa-plus"></i> Enviar Email</a>
					</div>
				</div>
				
				<div class="card-body">
					@include('livewire.candidaturas.create')
					@include('livewire.candidaturas.update')
					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<td>#</td> 
									<th>Nombre</th>
									<th>Apellidos</th>
									<th>Fecha de nacimiento</th>
									<th>Nacionalidad</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Cuenta de usuario</th>
									<th>Puntos</th>
									<th>Descripción</th>
									<th>Fecha de registro</th>
									<th>Promo id</th>
									<td>Acciones</td>
								</tr>
							</thead>
							<tbody>
								@foreach($candidaturas as $row)
								<tr>
									<td>{{ $loop->iteration }}</td> 
									<td>{{ $row->nombre }}</td>
									<td>{{ $row->apellidos }}</td>
									<td>{{ $row->fecha_de_nacimiento }}</td>
									<td>{{ $row->nacionalidad }}</td>
									<td>{{ $row->email }}</td>
									<td>{{ $row->teléfono }}</td>
									<td>{{ $row->cuenta_usuario }}</td>
									<td>{{ $row->puntos }}</td>
									<td>{{ $row->descripción }}</td>
									<td>{{ $row->fecha_de_registro }}</td>
									<td>{{ $row->promo_id }}</td>
									<td width="90">
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Acciones
										</button>
										<div class="dropdown-menu dropdown-menu-right">
										<a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>							 
										<a class="dropdown-item" onclick="confirm('¿Confirmas que quieres borrar la candidatura con id {{$row->id}}? \n¡Esta acción no se puede deshacer!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Borrar </a>   
										</div>
									</div>
									</td>
								@endforeach
							</tbody>
						</table>						
						{{ $candidaturas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>