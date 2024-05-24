<x-mary-form wire:submit="crearTarea">


	<x-mary-input label="Título" wire:model="titulo" />


	<x-mary-input label="Descripcion" wire:model="descripcion" />


	<x-mary-select label="Estatus" icon="o-user" :options="$lista_estatus" wire:model="estatus" />


	<x-slot:actions>
        <x-mary-button label="Cancelar" />
        <x-mary-button label="Guardar" class="btn-primary text-white" type="submit" spinner="crearTarea" />
    </x-slot:actions>


</x-mary-form>
@script
<script>
    $wire.on('tarea-guardada', () => {
        alert('tarea guardada con éxito :D')
    });
</script>
@endscript
