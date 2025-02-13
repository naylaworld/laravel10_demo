<?php

namespace App\Http\Livewire\Web\Category;

use App\Models\Category;
use Livewire\Component;

class Single extends Component
{

    public $category;

    public function mount(Category $Category){
        $this->category = $Category;
    }

    public function delete()
    {
        $this->category->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Category') ]) ]);
        $this->emit('categoryDeleted');
    }

    public function render()
    {
        return view('livewire.web.category.single')
            ->layout('web::layouts.app');
    }
}
