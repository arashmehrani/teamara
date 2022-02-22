<?php

namespace Modules\Post\Http\Livewire;

use App\Helpers\Helpers;
use Livewire\Component;

class NewPost extends Component
{
    public $title, $slug, $newSlug;
    public $ChangeSlug = false;


    public function render()
    {
        return view('post::livewire.new-post');
    }

    public function updatedTitle()
    {
        if ($this->ChangeSlug == false) {
            $this->slug = Helpers::makeSlug($this->title);
        }

    }

    public function ChangeSlug()
    {
        $this->ChangeSlug = true;
    }

}
