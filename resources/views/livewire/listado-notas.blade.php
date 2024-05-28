@php
	$numero = 0;
@endphp
<div>

	<input wire:model.live="search">


    <table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Título</th>
				<th>Descripicón</th>
				<th>Estatus</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ( $notas as $notas )
			@php
				$numero++;
			@endphp
				<tr>
					<td>{{ $numero }}</td>
					<td>{{ $notas->titulo }}</td>
					<td>{{ $notas->descripcion }}</td>
					<td>
						@if ($notas->estatus == 'completado')
							<x-mary-badge value="Completado" class="bg-green-400" />
						@else
							<x-mary-badge value="Pendiente" class="bg-orange-300" />
						@endif
					</td>
					<td>
						<x-mary-dropdown>
							<x-slot:trigger>
								<x-mary-button icon="o-ellipsis-vertical" class="btn-square" />
							</x-slot:trigger>

							<x-mary-menu-item title="Ver" icon="o-information-circle"/>
							<x-mary-menu-item title="Editar" icon="o-pencil" />
							<x-mary-menu-item title="Borrar" icon="o-trash" />
						</x-mary-dropdown>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
