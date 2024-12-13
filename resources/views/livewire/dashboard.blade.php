<div class="p-6">
    <!-- Statistik dengan desain yang lebih modern -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="relative overflow-hidden bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-lg p-6">
            <div class="relative z-10 flex items-center">
                <div class="p-3 rounded-xl bg-white/20 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-100">Total Tugas</p>
                    <p class="text-3xl font-bold text-white">{{ $totalTasks }}</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl shadow-lg p-6">
            <div class="relative z-10 flex items-center">
                <div class="p-3 rounded-xl bg-white/20 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-yellow-100">Pending</p>
                    <p class="text-3xl font-bold text-white">{{ $pendingTasks }}</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl shadow-lg p-6">
            <div class="relative z-10 flex items-center">
                <div class="p-3 rounded-xl bg-white/20 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-indigo-100">In Progress</p>
                    <p class="text-3xl font-bold text-white">{{ $inProgressTasks }}</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg p-6">
            <div class="relative z-10 flex items-center">
                <div class="p-3 rounded-xl bg-white/20 mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-green-100">Completed</p>
                    <p class="text-3xl font-bold text-white">{{ $completedTasks }}</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 opacity-10">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Tugas Terbaru dan Mendatang dengan desain yang lebih modern -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Tugas Terbaru -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-700/50">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Tugas Terbaru
                </h2>
            </div>
            <div class="p-6">
                @if($recentTasks->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentTasks as $task)
                            <div class="p-4 rounded-xl border border-gray-100 dark:border-gray-700 hover:bg-gray-50/80 dark:hover:bg-gray-700/50 transition-all duration-200">
                                <div class="flex justify-between items-center">
                                    <div class="flex-1">
                                        <h3 class="font-medium text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 flex items-center gap-2 cursor-pointer"
                                            onclick="showTaskDetail('{{ $task->title }}', '{{ $task->description }}', '{{ $task->status }}', '{{ $task->due_date }}')"
                                            data-modal-target="taskDetailModal" 
                                            data-modal-toggle="taskDetailModal">
                                            <span class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">{{ $task->title }}</span>
                                            <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ Str::limit($task->description, 50) }}</p>
                                        
                                        <div class="flex items-center gap-3 mt-2">
                                            <span @class([
                                                'px-2.5 py-1 text-xs font-medium rounded-full inline-flex items-center gap-1',
                                                'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300' => $task->status === 'pending',
                                                'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' => $task->status === 'in_progress',
                                                'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' => $task->status === 'completed',
                                            ])>
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                                                </svg>
                                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                            </span>

                                            @if($task->due_date)
                                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300 gap-1">
                                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                    {{ $task->due_date }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Tidak ada tugas terbaru</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Tugas Mendatang - menggunakan style yang sama -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-100 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-700/50">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Tugas Mendatang
                </h2>
            </div>
            <div class="p-6">
                @if($upcomingTasks->count() > 0)
                    <div class="space-y-4">
                        @foreach($upcomingTasks as $task)
                            <div class="p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-200 border border-gray-100 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-medium text-gray-900 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 cursor-pointer flex items-center gap-2"
                                            onclick="showTaskDetail('{{ $task->title }}', '{{ $task->description }}', '{{ $task->status }}', '{{ $task->due_date }}')"
                                            data-modal-target="taskDetailModal" 
                                            data-modal-toggle="taskDetailModal">
                                            <span>{{ $task->title }}</span>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Due: {{ $task->due_date }}</p>
                                    </div>
                                    <span @class([
                                        'px-3 py-1 text-xs font-medium rounded-full',
                                        'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300' => $task->status === 'pending',
                                        'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300' => $task->status === 'in_progress',
                                        'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300' => $task->status === 'completed',
                                    ])>
                                        {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="mt-2 text-gray-500 dark:text-gray-400">Tidak ada tugas mendatang</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Detail Tugas -->
    <div id="taskDetailModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow">
                <div class="flex items-start justify-between p-4 border-b dark:border-gray-600 rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modalTaskTitle">
                        <!-- Judul akan diisi via JavaScript -->
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="taskDetailModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Tutup modal</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="modalTaskDescription">
                        <!-- Deskripsi akan diisi via JavaScript -->
                    </p>
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-gray-900 dark:text-white">Status:</span>
                        <span id="modalTaskStatus" class="px-2 py-1 text-xs rounded-full">
                            <!-- Status akan diisi via JavaScript -->
                        </span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-gray-900 dark:text-white">Deadline:</span>
                        <span id="modalTaskDueDate" class="text-gray-500">
                            <!-- Tanggal deadline akan diisi via JavaScript -->
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Modal -->
    <script>
        function showTaskDetail(title, description, status, dueDate) {
            document.getElementById('modalTaskTitle').textContent = title;
            document.getElementById('modalTaskDescription').textContent = description;
            
            const statusElement = document.getElementById('modalTaskStatus');
            statusElement.textContent = status.replace('_', ' ').charAt(0).toUpperCase() + status.slice(1);
            
            // Mengatur class untuk status
            statusElement.className = 'px-2 py-1 text-xs rounded-full ';
            if (status === 'pending') {
                statusElement.className += 'bg-yellow-100 text-yellow-800';
            } else if (status === 'in_progress') {
                statusElement.className += 'bg-blue-100 text-blue-800';
            } else if (status === 'completed') {
                statusElement.className += 'bg-green-100 text-green-800';
            }
            
            document.getElementById('modalTaskDueDate').textContent = dueDate || 'Tidak ada deadline';
        }
    </script>
</div>