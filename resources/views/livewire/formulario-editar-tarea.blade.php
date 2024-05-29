<div>
	<x-mary-form wire:submit="editar">

		<h1>Editar tarea</h1>

		<x-mary-input label="Título" wire:model="titulo" />


		<x-mary-input label="Descripcion" wire:model="descripcion" />


		<x-mary-select label="Estatus" icon="o-user" :options="$lista_estatus" wire:model="estatus" />


		<x-slot:actions>
			<div class="w-full flex justify-between">
				<x-mary-button label="Eliminar" class="btn-error text-white" />
				<div class="">
					<x-mary-button label="Cancelar" class="mr-4" />
					<x-mary-button label="Guardar" class="btn-primary text-white" type="submit" spinner="editar" />
				</div>
			</div>
		</x-slot:actions>





	</x-mary-form>



	<button class="btn" onclick="my_modal_1.showModal()">open modal</button>
	<dialog id="my_modal_1" class="modal">
		<div class="modal-box">
			<form method="dialog">
				<button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
			</form>
			<x-mary-form wire:submit="editar">
				<h3 class="font-bold text-lg">Confirmar</h3>
				<p class="py-4">¿Desea eliminar este registro?</p>
				<div class="modal-action">
					<form method="dialog">
						<x-mary-button label="Cancelar" type="submit" />
					</form>
					<x-mary-button label="Si, eliminar" class="btn-primary" type="submit" spinner="editar" />
				</div>
			</x-mary-form>
		</div>
	</dialog>

</div>
