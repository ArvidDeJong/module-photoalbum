<?php

namespace App\Livewire\Manta\Photoalbum;

use Manta\Models\Photoalbum;
use Darvis\Manta\Traits\MantaPagerowTrait;

new class extends \Livewire\Volt\Component {
    public Photoalbum $item;

    use MantaPagerowTrait;
};
?>
<flux:table.row data-id="{{ $item->id }}">
    <flux:table.cell><x-manta.tables.image :item="$item->image" /></flux:table.cell>
    <flux:table.cell>{{ $item->title }}</flux:table.cell>
    @if ($fields['slug']['active'])
        <flux:table.cell>{{ $item->slug }}</flux:table.cell>
    @endif
    <flux:table.cell>{{ count($item->uploads) > 0 ? count($item->uploads) : null }}</flux:table.cell>
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :$fields />
</flux:table.row>
