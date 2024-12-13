<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class TaskManager extends Component
{
    public $title;
    public $description;
    public $status = 'pending';
    public $due_date;
    public $task_id;
    public $isEditing = false;
    public $is_upcoming = false;
    public $isModalOpen = false;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'nullable',
        'status' => 'required|in:pending,in_progress,completed',
        'due_date' => 'nullable|date',
        'is_upcoming' => 'boolean'
    ];

    public function render()
    {
        return view('livewire.task-manager', [
            'tasks' => Task::orderBy('created_at', 'desc')->get()
        ])->layout('layouts.app');
    }

    public function store()
    {
        $this->validate();
        
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Tugas berhasil ditambahkan.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $this->task_id = $id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->due_date = $task->due_date;
        $this->is_upcoming = $task->is_upcoming;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        Task::find($this->task_id)->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'is_upcoming' => $this->is_upcoming,
        ]);

        $this->resetInputs();
        session()->flash('message', 'Tugas berhasil diperbarui.');
    }

    public function delete($id)
    {
        Task::find($id)->delete();
        session()->flash('message', 'Tugas berhasil dihapus.');
    }

    private function resetInputs()
    {
        $this->title = '';
        $this->description = '';
        $this->status = 'pending';
        $this->due_date = '';
        $this->task_id = '';
        $this->is_upcoming = false;
        $this->isEditing = false;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset(['title', 'description']);
        $this->resetValidation();
    }
}