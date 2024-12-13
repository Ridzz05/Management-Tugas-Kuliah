<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manajemen Tugas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Meta tags untuk preview WhatsApp dan media sosial -->
    <meta property="og:title" content="Manajemen Tugas - Aplikasi Pengelola Tugas">
    <meta property="og:description" content="Aplikasi manajemen tugas untuk membantu Anda mengelola dan melacak tugas-tugas dengan lebih efisien">
    <meta property="og:image" content="https://cdn.pixabay.com/photo/2017/07/31/11/31/laptop-2557468_1280.jpg">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    
    <!-- Meta tags khusus WhatsApp -->
    <meta property="og:site_name" content="Manajemen Tugas">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="853">

    <!-- Meta tags tambahan -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image:alt" content="Preview Aplikasi Manajemen Tugas">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    
    <div class="p-4 sm:ml-64 pt-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </div>
    
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            if (localStorage.getItem('color-theme') === 'dark' || 
                (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            themeToggleBtn.addEventListener('click', function() {
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

    <script>
    document.addEventListener('livewire:initialized', () => {
        initializeTimePicker();
        
        Livewire.on('refresh-scripts', () => {
            initializeTimePicker();
        });
    });

    function initializeTimePicker() {
        const timePickerConfig = {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minuteIncrement: 30,
            defaultHour: 8,
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
                },
                months: {
                    shorthand: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                    longhand: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]
                }
            }
        };

        document.querySelectorAll('[data-time-picker]').forEach(element => {
            if (!element.classList.contains('time-picker-initialized')) {
                const picker = new Flowbite.Timepicker(element, timePickerConfig);
                element.classList.add('time-picker-initialized');
                
                element.addEventListener('change', function(e) {
                    Livewire.dispatch('time-selected', { time: e.target.value });
                });
            }
        });
    }
    </script>
</body>
</html>