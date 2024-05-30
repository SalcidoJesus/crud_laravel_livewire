@php
	$pagina = $notas->currentPage() - 1;
	$numero = $pagina * 10;
@endphp
<div>

	{{-- <input wire:model.live="search"> --}}
	{{-- <progress wire:loading.class="progress h-0.5"></progress> --}}

	<div class="my-4 flex gap-4">
		<div class="w-full md:w-1/3">
			<x-mary-input
				placeholder="Buscar"
				icon="o-magnifying-glass"
				wire:model.live="search"/>
		</div>

		<span wire:loading.class="loading loading-lg loading-spinner"></span>

	</div>

    <table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>Título</th>
				<th>Descripcón</th>
				<th>Estatus</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody wire:loading.class="opacity-40">
			@foreach ( $notas as $nota )
			@php
				$numero++;
			@endphp
				<tr>
					<td>{{ $numero }}</td>
					<td>{{ $nota->titulo }}</td>
					<td>{{ $nota->descripcion }}</td>
					<td>
						@if ($nota->estatus == 'completado')
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

							<x-mary-menu-item title="Ver" icon="o-information-circle" link="{{ route('notas.show', $nota->id)}}"/>
							<x-mary-menu-item title="Editar" icon="o-pencil"  link="{{ route('notas.edit', $nota->id)}}"/>
							<x-mary-menu-item title="Borrar" icon="o-trash" />
						</x-mary-dropdown>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>


	{{ $notas->onEachSide(2)->links() }}

</div>
