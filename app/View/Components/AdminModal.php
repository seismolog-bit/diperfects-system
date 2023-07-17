<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminModal extends Component
{
    public $id;
    public $title;

    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.admin-modal');
    }
}
