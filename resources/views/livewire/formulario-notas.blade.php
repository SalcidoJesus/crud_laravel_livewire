<div>
	<h1>Formulario</h1>
	<x-mary-form wire:submit="guardarNota">

		<x-mary-input label="Título" wire:model="titulo" />

		<x-mary-input label="Descripción" wire:model="descripcion" />

		<x-mary-select label="Selecciona un estatus" :options="$opciones" wire:model="estatus" />

		<x-slot:actions>
			<x-mary-button label="Cancelar" link="{{ route('notas.index') }}"/>
			<x-mary-button label="Guardar" class="btn-primary text-white" type="submit" spinner="guardarNota" />
		</x-slot:actions>
	</x-mary-form>

</div>