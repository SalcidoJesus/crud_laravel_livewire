<x-app-layout>
	@section('titulo', 'Crear tarea')
	{{-- <x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Dashboard') }}
		</h2>
	</x-slot> --}}

	<div class="py-12">
		<div class="max-w-full mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="text-gray-900">



					<x-plantilla-drawer>
						<livewire:formulario-tareas/>
					</x-plantilla-drawer>


					{{-- <x-alerta>
						contenido nuevo
					</x-alerta>

					<x-alerta class="text-4xl text-white">
						otro texto
					</x-alerta>

					<x-alerta class="bg-green-400 font-bold">
						hola mundo
					</x-alerta>
 --}}




				</div>
			</div>
		</div>
	</div>
</x-app-layout>