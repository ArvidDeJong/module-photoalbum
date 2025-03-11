<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'middleware' => ['auth:staff', 'web']], function () {

    $modules = collect(cms_config('manta')['modules']);


    $agendaModule = $modules->firstWhere("name", 'photoalbum');
    $name = isset($agendaModule['routename']) ? $agendaModule['routename'] : 'photoalbum';
    Route::get("/{$name}", Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumList::class)->name('photoalbum.list');
    Route::get("/{$name}/toevoegen", Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumCreate::class)->name('photoalbum.create');
    Route::get("/{$name}/aanpassen/{photoalbum}", Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumUpdate::class)->name('photoalbum.update');
    Route::get("/{$name}/lezen/{photoalbum}", Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumRead::class)->name('photoalbum.read');
    Route::get("/{$name}/bestanden/{photoalbum}", Darvis\ModulePhotoalbum\Livewire\Photoalbum\PhotoalbumUpload::class)->name('photoalbum.upload');
});
