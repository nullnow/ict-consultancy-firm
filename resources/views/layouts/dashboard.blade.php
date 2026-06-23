<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Console Engine // OPES Core Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dash: {
                            'bg': '#090a14',
                            'surface': '#111326',
                            'accent-blue': '#1e40af',
                            'accent-blue-light': '#2563eb',
                            'text': '#e2e8f0',
                            'muted': '#64748b'
                        }
                    },
                    fontFamily: { heading: ['Montserrat', 'sans-serif'], body: ['Inter', 'sans-serif'] }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body { @apply bg-dash-bg text-dash-text font-body antialiased min-h-screen; }
            h1, h2, h3, h4 { @apply font-heading uppercase font-extrabold tracking-tight; }
        }
    </style>
</head>
<body class="pt-20">

    <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm py-4 px-8 flex justify-between items-center border-b border-gray-200">
        <div class="flex items-center gap-4">
            <div class="flex flex-col">
                <span class="font-heading font-black text-xl text-dash-accent-blue uppercase tracking-tighter">OPES Technologies</span>
                <span class="font-heading font-bold text-[9px] text-gray-400 tracking-widest -mt-1 uppercase">Admin Management Dashboard</span>
            </div>
        </div>
        <nav class="flex items-center gap-8">
            <a href="{{ route('admin.dashboard') }}" class="font-heading font-bold text-xs uppercase tracking-wider text-dash-accent-blue hover:text-dash-accent-blue-light">Dashboard Control Center</a>
            <a href="{{ route('home') }}" target="_blank" class="font-heading font-bold text-xs uppercase tracking-wider text-gray-500 hover:text-dash-accent-blue">View Public Site <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-[10px]"></i></a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-gray-100 hover:bg-red-50 text-red-600 font-heading font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-sm transition-colors">
                    Logout
                </button>
            </form>
        </nav>
    </header>

    <main class="w-full max-w-[95%] mx-auto py-8">

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-950/80 text-emerald-400 font-medium text-sm rounded-lg flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @yield('main_content')
    </main>

</body>
</html>
