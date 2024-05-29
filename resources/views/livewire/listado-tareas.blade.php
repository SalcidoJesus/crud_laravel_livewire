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

						<x-mary-menu-item title="Ver" icon="o-information-circle" @click="$wire.editar({{ $tarea->id }})" />
						<x-mary-menu-item title="Editar" icon="o-pencil" link="{{ route('tareas.edit', $tarea->id) }}" />
						<x-mary-menu-item title="Borrar" icon="o-trash" />
					</x-mary-dropdown>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>


	<x-mary-modal wire:model="mostrarModal" class="backdrop-blur">
		<div>{{ $titulo }}</div>
		<div>{{ $descripcion }}</div>
		<div>{{ $estatus }}</div>
		<x-mary-button label="Cancel" @click="$wire.mostrarModal = false" />
	</x-mary-modal>




</div>