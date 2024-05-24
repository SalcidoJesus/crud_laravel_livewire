@php
	$numero = 0;
@endphp
<div>
	<table class="table">
		<thead>
			<th>#</th>
			<th>Título</th>
			<th>Descripción</th>
			<th>Estatus</th>
			<th>Opciones</th>
		</thead>
		<tbody>
			@foreach ( $tareas as $tarea )
			@php
				$numero++;
			@endphp
			<tr>
				<td>{{ $numero }}</td>
				<td>{{ $tarea->titulo }}</td>
				<td>{{ $tarea->descripcion }}</td>
				<td>
					@if ($tarea->estatus == 'completado')
					<x-mary-badge value="Completado" class="bg-success text-white" />
					@else
					<x-mary-badge value="Pendiente" class="bg-warning text-white" />
					@endif
				</td>

				<td>
					<x-mary-dropdown>
						<x-slot:trigger>
							<x-mary-button icon="o-ellipsis-vertical" class="btn-square" />
						</x-slot:trigger>

						<x-mary-menu-item title="Ver" icon="o-information-circle" @click="$wire.modal_abierto = true" />
						<x-mary-menu-item title="Editar" icon="o-pencil" />
						<x-mary-menu-item title="Borrar" icon="o-trash" />
					</x-mary-dropdown>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>



	<x-mary-modal wire:model="modal_abierto" class="backdrop-blur">
		<p>{{ $titulo }}</p>
		<p>{{ $descripcion }}</p>
		<p>{{ $estatus }}</p>
		<x-mary-button label="Cerrar" @click="$wire.modal_abierto = false" />
	</x-mary-modal>


</div>