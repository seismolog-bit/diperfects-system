<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminPageHeader extends Component
{
    public $title;
    public $subtitle;

    public function __construct($title, $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.admin-page-header');
    }
}
