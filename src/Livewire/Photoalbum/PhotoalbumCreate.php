<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\Manta\Services\Openai;
use Darvis\Manta\Traits\MantaTrait;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;

class PhotoalbumCreate extends Component
{
    use MantaTrait;
    use PhotoalbumTrait;

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale') && $request->input('pid')) {
            $item = Photoalbum::find($request->input('pid'));
            $this->pid = $item->id;
            $this->locale = $request->input('locale');
            $this->itemOrg = $item;
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('create');
    }

    public function render()
    {
        return view('manta::default.manta-default-create')->title($this->config['module_name']['single'] . ' toevoegen');
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
        $row['created_by'] = auth('staff')->user()->name;
        $row['host'] = request()->host();
        $row['slug'] = $this->slug ? $this->slug : Str::of($this->title)->slug('-');
        Photoalbum::create($row);

        return $this->redirect(PhotoalbumList::class);
    }
}
