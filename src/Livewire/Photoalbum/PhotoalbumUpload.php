<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Livewire\Component;
use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\Manta\Traits\MantaTrait;

class PhotoalbumUpload extends Component
{
    use MantaTrait;
    use PhotoalbumTrait;

    public function mount(Photoalbum $photoalbum)
    {
        $this->item = $photoalbum;
        $this->itemOrg = $photoalbum;
        $this->id = $photoalbum->id;
        $this->locale = $photoalbum->locale;



        $this->getLocaleInfo();
        $this->getBreadcrumb('upload');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-upload')->title($this->config['module_name']['single'] . ' bestanden');
    }
}
