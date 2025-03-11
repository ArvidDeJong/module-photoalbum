<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Flux\Flux;
use Livewire\Component;
use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhotoalbumUpdate extends Component
{
    use MantaTrait;
    use PhotoalbumTrait;

    public function mount(Photoalbum $photoalbum)
    {
        $this->item = $photoalbum;
        $this->itemOrg = translate($photoalbum, 'nl')['org'];
        $this->id = $photoalbum->id;

        $this->fill(
            $photoalbum->only(
                'company_id',
                'pid',
                'locale',
                'title',
                'title_2',
                'slug',
                'seo_title',
                'seo_description',
                'excerpt',
                'content',
            ),
        );
        $this->getLocaleInfo();
        $this->getBreadcrumb('update');
        $this->getTablist();
    }

    public function render()
    {
        return view('manta::default.manta-default-update')->title($this->config['module_name']['single'] . ' aanpassen');
    }


    public function save()
    {
        $this->validate();

        $row = $this->only(
            'company_id',
            'pid',
            'locale',
            'title',
            'title_2',
            'slug',
            'seo_title',
            'seo_description',
            'excerpt',
            'content',
        );
        $row['updated_by'] = auth('staff')->user()->name;
        Photoalbum::where('id', $this->id)->update($row);

        // return redirect()->to(route($this->route_name . '.list'));
        Flux::toast('Opgeslagen', duration: 1000, variant: 'success');
    }
}
