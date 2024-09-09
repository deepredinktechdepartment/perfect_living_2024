<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;

class MenuWidget extends Component
{
    public $position;

    public function __construct($position = null)
    {
        $this->position = $position;
    }

    public function render()
    {
        $menus = Menu::where('active', true)
                     ->when($this->position, function ($query) {
                         return $query->where('position', $this->position);
                     })
                     ->get();

        return view('components.menu-widget', ['menus' => $menus]);
    }
}
