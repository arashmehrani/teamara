<?php

namespace Modules\Post\Http\Livewire;

use Livewire\Component;

class NewPost extends Component
{
    public $title, $slug;

    public function render()
    {
        return view('post::livewire.new-post');
    }
}
