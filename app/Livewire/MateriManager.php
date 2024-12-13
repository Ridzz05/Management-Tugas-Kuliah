<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;

class MateriManager extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $file;
    public $materiId;
    public $isEditing = false;
    public $schedule;
    public $hour;
    public $minute;

    protected $rules = [
        'title' => 'required|min:3',
        'description' => 'nullable',
        'file' => 'required|file|max:10240',
        'schedule' => 'required|date',
        'hour' => 'required|between:0,23',
        'minute' => 'required|between:0,59'
    ];

    protected $listeners = ['time-selected' => 'setTime'];

    public function mount()
    {
        // Set default waktu ke jam 8 pagi
        $this->hour = '08';
        $this->minute = '00';
    }

    public function store()
    {
        $this->validate();

        $fileName = $this->file->getClientOriginalName();
        $filePath = $this->file->store('materi', 'public');
        $fileSize = $this->file->getSize();

        // Gabungkan tanggal dan waktu
        $scheduleDateTime = $this->schedule . ' ' . $this->hour . ':' . $this->minute . ':00';

        Materi::create([
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'schedule' => $scheduleDateTime
        ]);

        session()->flash('message', 'Materi berhasil ditambahkan.');
        $this->reset();
        $this->mount(); // Reset ke default waktu
        
        // Dispatch event untuk menutup modal
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $this->materiId = $id;
        $this->title = $materi->title;
        $this->description = $materi->description;
        $this->schedule = $materi->schedule->format('Y-m-d');
        $this->hour = $materi->schedule->format('H');
        $this->minute = $materi->schedule->format('i');
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'nullable',
            'file' => 'nullable|file|max:10240'
        ]);

        $materi = Materi::findOrFail($this->materiId);
        $updateData = [
            'title' => $this->title,
            'description' => $this->description,
        ];

        if ($this->file) {
            // Hapus file lama
            Storage::disk('public')->delete($materi->file_path);
            
            // Upload file baru
            $fileName = $this->file->getClientOriginalName();
            $filePath = $this->file->store('materi', 'public');
            $fileSize = $this->file->getSize();

            $updateData['file_path'] = $filePath;
            $updateData['file_name'] = $fileName;
            $updateData['file_size'] = $fileSize;
        }

        $scheduleDateTime = $this->schedule . ' ' . $this->hour . ':' . $this->minute . ':00';
        $updateData['schedule'] = $scheduleDateTime;

        $materi->update($updateData);

        session()->flash('message', 'Materi berhasil diperbarui.');
        $this->reset();
    }

    public function delete($id)
    {
        $materi = Materi::findOrFail($id);
        Storage::disk('public')->delete($materi->file_path);
        $materi->delete();
        session()->flash('message', 'Materi berhasil dihapus.');
    }

    public function download($id)
    {
        $materi = Materi::findOrFail($id);
        return Storage::disk('public')->download($materi->file_path, $materi->file_name);
    }

    public function render()
    {
        return view('livewire.materi', [
            'materials' => Materi::orderBy('created_at', 'desc')
                            ->get()
        ])->layout('layouts.app');
    }

    public function setTime($time)
    {
        $this->schedule_time = $time;
    }
}
