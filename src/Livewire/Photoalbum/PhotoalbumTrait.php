<?php

namespace Darvis\ModulePhotoalbum\Livewire\Photoalbum;

use Darvis\ModulePhotoalbum\Models\Photoalbum;
use Darvis\ModulePhotoalbum\Services\Openai;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Locked;
use Illuminate\Support\Str;

trait PhotoalbumTrait
{
    public function __construct()
    {
        $this->route_name = 'photoalbum';
        $this->route_list = route($this->route_name . '.list');
        $this->config = module_config('Photoalbum');
        $this->fields = $this->config['fields'];
        $this->moduleClass = 'Darvis\ModulePhotoalbum\Models\Photoalbum';
    }


    // * Model items
    public ?Photoalbum $item = null;
    public ?Photoalbum $itemOrg = null;



    #[Locked]
    public ?string $company_id = null;

    #[Locked]
    public ?string $host = null;

    public ?string $locale = null;
    public ?string $pid = null;

    public ?string $title = null;
    public ?string $title_2 = null;

    public ?string $seo_title = null;
    public ?string $seo_description = null;
    public ?string $tags = null;
    public ?string $summary = null;
    public ?string $excerpt = null;
    public ?string $content = null;


    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where(function (Builder $querysub) {
                $querysub->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('content', 'LIKE', "%{$this->search}%");
            });
    }

    public function rules()
    {
        $return = [];
        if ($this->fields['title']) $return['title'] = 'required';
        // if ($this->fields['excerpt']) $return['excerpt'] = 'required';
        return $return;
    }

    public function messages()
    {
        $return = [];
        if ($this->fields['title']) $return['title.required'] = 'De titel is verplicht';
        if ($this->fields['excerpt']) $return['excerpt.required'] = 'De inleiding is verplicht';
        return $return;
    }
}
