<?php

namespace App\Http\Livewire\Web\Task;

use App\Models\Task;
use Livewire\Component;

class Single extends Component
{

    public $task;

    public function mount(Task $Task){
        $this->task = $Task;
    }

    public function delete()
    {
        $this->task->delete();
        $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => __('DeletedMessage', ['name' => __('Task') ]) ]);
        $this->emit('taskDeleted');
    }

    public function render()
    {
        return view('livewire.web.task.single')
            ->layout('web::layouts.app');
    }
}
