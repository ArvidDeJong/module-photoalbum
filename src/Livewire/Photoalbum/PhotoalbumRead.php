<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Livewire\Component;
use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;

class PhotoalbumRead extends Component
{
    use MantaTrait;
    use PhotoalbumTrait;

    public function mount(Request $request, Photoalbum $photoalbum)
    {
        $this->item = $photoalbum;
        $this->itemOrg = $photoalbum;
        $this->locale = $photoalbum->locale;
        if ($request->input('locale') && $request->input('locale') != getLocaleManta()) {
            $this->pid = $photoalbum->id;
            $this->locale = $request->input('locale');
            $item_translate = Photoalbum::where(['pid' => $photoalbum->id, 'locale' => $request->input('locale')])->first();
            $this->item = $item_translate;
        }

        if ($photoalbum) {
            $this->id = $photoalbum->id;
        }
        $this->getLocaleInfo();
        $this->getBreadcrumb();
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-read')->title($this->config['module_name']['single'] . ' bekijken');
    }
}
