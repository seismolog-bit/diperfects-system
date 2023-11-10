<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductDetail extends Component
{
    public $title;
    public $category_id;
    public $slug;
    public $price;
    public $image;
    public $category;

    public function __construct($title, $category_id, $slug, $price, $image, $category)
    {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->slug = $slug;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }

    public function render()
    {
        return view('components.product-detail');
    }
}
