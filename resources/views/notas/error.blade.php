@section('titulo', 'Error')
<x-app-layout>

	<div class="py-12">
		<div class="max-w-full mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="text-gray-900">



					<x-plantilla-drawer>
						{{-- 404 --}}
						<div class="flex items-center justify-center">
							<h1 class="text-xl">El recurso que buscas no existe</h1>
						</div>
					</x-plantilla-drawer>


				</div>
			</div>
		</div>
	</div>
</x-app-layout>
