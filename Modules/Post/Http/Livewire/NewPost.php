<?php

namespace Modules\Post\Http\Livewire;

use App\Helpers\Helpers;
use Livewire\Component;

class NewPost extends Component
{
    public $title, $slug;

    public function render()
    {
        return view('post::livewire.new-post');
    }

    public function updatedTitle()
    {
        $this->slug = Helpers::makeSlug($this->title);
    }
}
