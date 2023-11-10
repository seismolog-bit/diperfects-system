<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Kategori;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Kategori::all();
        $categories = (object) $categories;

        $view->with(compact('categories'));
    }
}
