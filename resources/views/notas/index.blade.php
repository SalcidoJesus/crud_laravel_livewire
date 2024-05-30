	@section('titulo', 'Notas')
<x-app-layout>


	<div class="py-12">
		<div class="max-w-full mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="text-gray-900">


					<x-plantilla-drawer>
						{{-- <x-mary-button label="Crear nota" link="{{ route('notas.create') }}" /> --}}

						<livewire:listado-notas />
					</x-plantilla-drawer>


				</div>
			</div>
		</div>
	</div>
</x-app-layout>
