<?php

namespace App\Http\Livewire\Web\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    
    protected $rules = [
        
    ];

    public function updated($input)
    {
        $this->validateOnly($input);
    }

    public function create()
    {
        if($this->getRules())
            $this->validate();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => __('CreatedMessage', ['name' => __('Task') ])]);
        
        Task::create([
            
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.web.task.create')
            ->layout('web::layouts.app', ['title' => __('CreateTitle', ['name' => __('Task') ])]);
    }
}
