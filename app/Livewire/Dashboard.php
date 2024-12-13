<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Dashboard extends Component
{
    public function render()
    {
        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $inProgressTasks = Task::where('status', 'in_progress')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        
        $recentTasks = Task::orderBy('created_at', 'desc')
                          ->take(5)
                          ->get();

        $upcomingTasks = Task::where('is_upcoming', true)
                            ->orderBy('due_date', 'asc')
                            ->take(5)
                            ->get();

        return view('livewire.dashboard', [
            'totalTasks' => $totalTasks,
            'pendingTasks' => $pendingTasks,
            'inProgressTasks' => $inProgressTasks,
            'completedTasks' => $completedTasks,
            'recentTasks' => $recentTasks,
            'upcomingTasks' => $upcomingTasks,
        ])->layout('layouts.app');
    }
}
