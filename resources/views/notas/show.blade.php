@section('titulo', 'Detalles de la nota')
<x-app-layout>

	<div class="py-12">
		<div class="max-w-full mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="text-gray-900">



					<x-plantilla-drawer>

						<x-mary-button label="Volver" icon="s-chevron-left" link="{{ route('notas.index') }}" />

						<table class="table">
							<tr>
								<th>Título</th>
								<td>{{ $nota->titulo }}</td>
							</tr>
							<tr>
								<th>Descripción</th>
								<td>{{ $nota->descripcion }}</td>
							</tr>
							<tr>
								<th>Estatus</th>
								<td>
									@if ($nota->estatus == 'completado')
										<x-mary-badge value="Completado" class="bg-green-400" />
									@else
										<x-mary-badge value="Pendiente" class="bg-orange-300" />
									@endif
								</td>
							</tr>
							<tr>
								<th>Fecha de registro</th>
								<td>{{ $nota->created_at }}</td>
							</tr>
							<tr>
								<th>Última acutalización</th>
								<td>
									@if ($nota->updated_at == $nota->created_at)
										No se ha actualizado
									@else
										{{ $nota->updated_at }}
									@endif
								</td>
							</tr>
						</table>

					</x-plantilla-drawer>





				</div>
			</div>
		</div>
	</div>
</x-app-layout>