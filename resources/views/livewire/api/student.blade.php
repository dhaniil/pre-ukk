<div>
    <x-filament::breadcrumbs :breadcrumbs="[
    '/' => 'Home',
    '/dashboard' => 'Dashboard',
    '/dashboard/users' => 'Users',
    '/dashboard/users/create' => 'Create User',
]" />

    <x-filament::dropdown>
        <x-slot name="trigger">
            <x-filament::button>
                More actions
            </x-filament::button>
        </x-slot>

        <x-filament::dropdown.list>
            <x-filament::dropdown.list.item wire:click="openViewModal">
                View
            </x-filament::dropdown.list.item>

            <x-filament::dropdown.list.item wire:click="openEditModal">
                Edit
            </x-filament::dropdown.list.item>

            <x-filament::dropdown.list.item wire:click="openDeleteModal">
                Delete
            </x-filament::dropdown.list.item>
        </x-filament::dropdown.list>
    </x-filament::dropdown>
</div>
