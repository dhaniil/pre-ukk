<x-layouts.app :title="__('Dashboard')">
    <div class="p-6 lg:p-8">
        <h1 class="text-3xl font-bold">Dashboard</h1>
    </div>
    <flux:separator />
    <div class="p-4">
        <livewire.internship-table />
    </div>
</x-layouts.app>
