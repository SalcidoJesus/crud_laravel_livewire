{{-- The main content with `full-width` --}}
<x-mary-main with-nav full-width>

	{{-- This is a sidebar that works also as a drawer on small screens --}}
	{{-- Notice the `main-drawer` reference here --}}
	<x-slot:sidebar drawer="main-drawer" class="bg-white border-e">

		{{-- User --}}
		{{-- @if($user = auth()->user())
		<x-mary-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="pt-2">
			<x-slot:actions>
				<x-mary-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="Salir"
					no-wire-navigate />
			</x-slot:actions>
		</x-mary-list-item>

		<x-mary-menu-separator />
		@endif --}}

		{{-- Activates the menu item when a route matches the `link` property --}}
		<x-mary-menu activate-by-route>
			<x-mary-menu-item title="Dashboard" icon="o-home" link="{{ route('dashboard') }}" />
			<x-mary-menu-item title="Tareas" icon="o-envelope" link="{{ route('tareas.index') }}" />
			<x-mary-menu-item title="Notas" icon="o-envelope" link="{{ route('notas.index') }}" />

			<x-mary-menu-sub title="Settings" icon="o-cog-6-tooth">
				<x-mary-menu-item title="Wifi" icon="o-wifi" link="####" />
				<x-mary-menu-item title="Archives" icon="o-archive-box" link="####" />
			</x-mary-menu-sub>

		</x-mary-menu>
	</x-slot:sidebar>

	{{-- The `$slot` goes here --}}
	<x-slot:content>
		{{ $slot }}
	</x-slot:content>
</x-mary-main>