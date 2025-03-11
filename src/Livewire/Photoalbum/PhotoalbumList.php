<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Livewire\Component;
use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\Manta\Traits\SortableTrait;
use Darvis\Manta\Traits\MantaTrait;
use Darvis\Manta\Traits\WithSortingTrait;
use Livewire\WithPagination;

class PhotoalbumList extends Component
{

    use PhotoalbumTrait;
    use WithPagination;
    use SortableTrait;
    use MantaTrait;
    use WithSortingTrait;

    public function mount()
    {
        $this->getBreadcrumb();
        $this->sortBy = 'title';
        $this->sortDirection = 'asc';
    }

    public function render()
    {
        $this->trashed = count(Photoalbum::whereNull('pid')->onlyTrashed()->get());

        $obj = Photoalbum::whereNull('pid');
        if ($this->tablistShow == 'trashed') {
            $obj->onlyTrashed();
        }
        $obj = $this->applySorting($obj);
        $obj = $this->applySearch($obj);
        $items = $obj->paginate(50);
        return view('module-photoalbum::livewire.photoalbum.photoalbum-list', ['items' => $items])->title($this->config['module_name']['multiple']);
    }
}
