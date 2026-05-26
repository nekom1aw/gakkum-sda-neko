<?php

namespace App\Livewire\Cms;

class PagehutanAdd extends SektorAdd
{
    protected string $category = 'hutan';
    protected string $label = 'Hutan';
    protected string $routeName = 'cms.sektor.hutan';
    protected string $editorPrefix = 'hutan';
}
