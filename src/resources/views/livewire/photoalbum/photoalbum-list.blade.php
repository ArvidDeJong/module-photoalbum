<flux:main container>
    <x-manta.breadcrumb :$breadcrumb />
    <div class="mt-4 flex">
        <div class="flex-grow">
            <x-manta::buttons.large type="add" :href="route($this->route_name . '.create')" />
        </div>
        <div class="w-1/5">
            <x-manta.input.search />
        </div>
    </div>
    <x-manta.tables.tabs :$tablistShow :$trashed />
    <flux:table :paginate="$items">
        <flux:table.columns>
            <flux:table.column>
                <flux:icon.photo />
            </flux:table.column>
            <flux:table.column sortable :sorted="$sortBy === 'title'" :direction="$sortDirection"
                wire:click="dosort('title')">
                Titel</flux:table.column>

            @if ($fields['slug']['active'])
                <flux:table.column sortable :sorted="$sortBy === 'slug'" :direction="$sortDirection"
                    wire:click="dosort('slug')">
                    Slug
                </flux:table.column>
            @endif
            <flux:table.column><flux:icon.document-duplicate /></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($items as $item)
                <livewire:manta.photoalbum.photoalbum-row :$fields :$item :route_name="$this->route_name" :$moduleClass
                    :key="$item->id">
            @endforeach
        </flux:table.rows>
    </flux:table>

</flux:main>
