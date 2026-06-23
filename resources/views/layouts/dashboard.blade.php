<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPES Technologies // Admin Dashboard</title>
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
<body class="pt-24 sm:pt-20">

    <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-sm py-4 px-4 sm:px-8 flex justify-between items-center border-b border-gray-200">
        <div class="flex items-center gap-4">
            <div class="flex flex-col">
                <span class="font-heading font-black text-lg sm:text-xl text-dash-accent-blue uppercase tracking-tighter line-clamp-1">OPES Technologies</span>
                <span class="font-heading font-bold text-[8px] sm:text-[9px] text-gray-400 tracking-widest -mt-0.5 sm:-mt-1 uppercase line-clamp-1">Admin Management Dashboard</span>
            </div>
        </div>

        <nav class="hidden md:flex items-center gap-8">
            <a href="{{ route('admin.dashboard') }}" class="font-heading font-bold text-xs uppercase tracking-wider text-dash-accent-blue hover:text-dash-accent-blue-light">Dashboard Homepage</a>
            <a href="{{ route('home') }}" target="_blank" class="font-heading font-bold text-xs uppercase tracking-wider text-gray-500 hover:text-dash-accent-blue">View Public Site <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-[10px]"></i></a>

            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-gray-100 hover:bg-red-50 text-red-600 font-heading font-bold text-xs uppercase tracking-wider px-4 py-2 rounded-sm transition-colors">
                    Logout
                </button>
            </form>
        </nav>

        <button id="mobile-menu-btn" type="button" class="md:hidden flex items-center justify-center text-gray-700 hover:text-dash-accent-blue focus:outline-none w-10 h-10 text-xl" aria-label="Toggle Navigation">
            <i class="fa-solid fa-bars transition-transform duration-300"></i>
        </button>

        <div id="mobile-nav" class="hidden fixed inset-x-0 top-[73px] bg-white border-b border-gray-200 shadow-xl flex flex-col p-6 gap-5 z-40 md:hidden transition-all duration-300">
            <a href="{{ route('admin.dashboard') }}" class="font-heading font-bold text-sm uppercase tracking-wider text-dash-accent-blue hover:text-dash-accent-blue-light py-2 border-b border-gray-50">
                <i class="fa-solid fa-gauge-high mr-2 text-xs"></i> Dashboard Homepage
            </a>
            <a href="{{ route('home') }}" target="_blank" class="font-heading font-bold text-sm uppercase tracking-wider text-gray-600 hover:text-dash-accent-blue py-2 border-b border-gray-50">
                <i class="fa-solid fa-globe mr-2 text-xs"></i> View Public Site <i class="fa-solid fa-arrow-up-right-from-square ml-1 text-[9px] text-gray-400"></i>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="w-full pt-2">
                @csrf
                <button type="submit" class="w-full text-center bg-red-50 hover:bg-red-100 text-red-600 font-heading font-bold text-sm uppercase tracking-wider py-3 rounded transition-colors block">
                    <i class="fa-solid fa-right-from-bracket mr-2 text-xs"></i> Logout
                </button>
            </form>
        </div>
    </header>

    <main class="w-full max-w-[95%] md:max-w-[90%] mx-auto py-6 sm:py-8">

        @if(session('success'))
            <div class="mb-6 sm:mb-8 p-4 bg-emerald-950/80 text-emerald-400 font-medium text-sm rounded-lg flex items-center gap-3 shadow-md">
                <i class="fa-solid fa-circle-check shrink-0"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @yield('main_content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileNav = document.getElementById('mobile-nav');
            const menuIcon = menuBtn.querySelector('i');

            menuBtn.addEventListener('click', function () {
                const isOpen = !mobileNav.classList.contains('hidden');

                if (isOpen) {
                    mobileNav.classList.add('hidden');
                    menuIcon.classList.remove('fa-xmark');
                    menuIcon.classList.add('fa-bars');
                } else {
                    mobileNav.classList.remove('hidden');
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-xmark');
                }
            });

            // Close navigation container drawer when viewport resizes beyond mobile boundaries
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    mobileNav.classList.add('hidden');
                    menuIcon.classList.remove('fa-xmark');
                    menuIcon.classList.add('fa-bars');
                }
            });
        });
    </script>
</body>
</html>
