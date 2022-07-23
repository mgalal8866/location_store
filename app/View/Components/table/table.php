<?php

namespace App\View\Components\table;

use Illuminate\View\Component;

class table extends Component
{
    public $headers;
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }


    public function render()
    {
        return view('components.table.table');
    }
}
