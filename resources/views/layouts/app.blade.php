<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OPES Technologies | Simplify your business')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght=600;700;800&family=Inter:wght=300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        opes: {
                            'dark': '#0c0d1c',
                            'darker': '#05060f',
                            'orange': '#ea4a2b',
                            'cyan': '#06b6d4',
                            'navy': '#1e204c',
                            'text-main': '#f8fafc',
                            'text-gray': '#a3a3a3',
                            'nav-blue': '#1e40af',
                            'nav-blue-hover': '#1d4ed8'
                        }
                    },
                    fontFamily: {
                        heading: ['Montserrat', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    }
                },
                container: { center: true, padding: '2rem' },
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            html { scroll-behavior: smooth; }
            body { @apply bg-opes-dark text-opes-text-main font-body leading-relaxed; }
            h1, h2, h3, h4 { @apply font-heading font-extrabold uppercase tracking-tight text-xl sm:text-2xl md:text-4xl; }

            /* Responsive Utilities for custom classes */
            .btn { @apply inline-flex items-center justify-center px-6 py-3 sm:px-8 sm:py-4 rounded-sm font-heading font-semibold uppercase tracking-widest text-xs sm:text-sm transition-all duration-300 w-full sm:w-auto; }
            .btn-primary { @apply bg-gradient-to-r from-opes-orange to-[#f97316] text-white shadow-lg hover:opacity-90 hover:-translate-y-0.5; }
            .btn-secondary { @apply bg-white/5 border border-opes-cyan text-opes-cyan backdrop-blur-sm hover:bg-opes-cyan/15 hover:text-white hover:-translate-y-0.5; }
            .glass-card { @apply bg-opes-dark/60 backdrop-blur-[25px] rounded-xl p-6 sm:p-10 transition-all duration-300 hover:bg-opes-navy/40; }
            .icon-wrapper { @apply w-12 h-12 sm:w-16 sm:h-16 rounded-xl bg-opes-orange/10 flex items-center justify-center text-xl sm:text-3xl text-opes-orange mb-4 sm:mb-6; }
            .industry-pill { @apply px-4 py-2 sm:px-6 sm:py-3 bg-white/5 rounded-sm font-heading font-semibold text-[10px] sm:text-xs tracking-wider transition-all hover:bg-opes-cyan/20 text-opes-text-main; }

            .text-gradient {
                background: linear-gradient(135deg, #ffffff, #ea4a2b, #06b6d4);
                background-size: 200% 200%;
                -webkit-background-clip: text; @apply text-transparent;
            }
        }
    </style>
</head>
<body class="relative min-h-screen pt-20 sm:pt-24">

    <canvas id="particle-canvas" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none opacity-40"></canvas>

    <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300 py-3 sm:py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex justify-between items-center">

            <!-- Logo Anchor -->
            <a href="{{ route('home') }}" class="flex flex-col items-center z-50">
                <img src="{{ Vite::asset('resources/images/Opes-logo.png') }}" width="80" height="auto" alt="OPES Logo" />
            </a>

            <!-- Desktop Navigation Matrix -->
            <nav class="hidden md:flex items-center gap-6 lg:gap-8">
                <a href="{{ route('home') }}" class="font-heading font-bold text-md uppercase tracking-wider {{ Request::is('/') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">Home</a>

                <div class="relative inline-block text-left">
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center gap-1 cursor-pointer font-heading font-bold text-md uppercase tracking-wider {{ Request::is('services*') ? 'text-opes-orange' : 'text-opes-nav-blue' }} list-none">
                            <span>All Services</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 py-1">
                            <a href="{{ route('services.index') }}" class="block px-4 py-2 font-heading font-bold text-md uppercase tracking-wider {{ Request::is('services') ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-100' }}">
                                Overview
                            </a>

                            <div class="border-t border-gray-100 my-1"></div>

                            <!-- Dynamic Dropdown Population Strategy -->
                            @if(isset($services) && $services->isNotEmpty())
                                @foreach($services as $navSrv)
                                    @if(Route::has('services.' . $navSrv->slug))
                                        <a href="{{ route('services.' . $navSrv->slug) }}" class="block px-4 py-2 font-heading font-bold text-md uppercase tracking-wider {{ Request::is('services/' . $navSrv->slug) ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-100' }}">
                                            {{ $navSrv->title }}
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                <!-- Resilient Fallback to core nodes via explicitly generated route names -->
                                @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'custom-crm' => 'Custom CRM', 'custom-erp' => 'Custom ERP'] as $slug => $label)
                                    @if(Route::has('services.' . $slug))
                                        <a href="{{ route('services.' . $slug) }}" class="block px-4 py-2 font-heading font-bold text-md uppercase tracking-wider {{ Request::is('services/' . $slug) ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-100' }}">
                                            {{ $label }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </details>
                </div>

                <a href="{{ route('about') }}" class="font-heading font-bold text-md uppercase tracking-wider {{ Request::is('about') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">About Us</a>
            </nav>

            <!-- Mobile Trigger Utility Button -->
            <button id="menu-toggle" class="md:hidden flex flex-col justify-center items-center w-8 h-8 space-y-1.5 z-50 relative focus:outline-none" aria-label="Toggle Menu">
                <span id="line-1" class="w-6 h-0.5 bg-opes-nav-blue transition-all duration-300 transform origin-center"></span>
                <span id="line-2" class="w-6 h-0.5 bg-opes-nav-blue transition-all duration-300"></span>
                <span id="line-3" class="w-6 h-0.5 bg-opes-nav-blue transition-all duration-300 transform origin-center"></span>
            </button>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu" class="fixed inset-0 bg-white z-40 flex flex-col justify-center items-center transition-all duration-300 translate-x-full md:hidden">
            <nav class="flex flex-col items-center gap-6 text-center px-6 w-full max-h-[75vh] overflow-y-auto">
                <a href="{{ route('home') }}" class="font-heading font-bold text-base uppercase tracking-wider {{ Request::is('/') ? 'text-opes-orange' : 'text-opes-nav-blue' }}">Home</a>

                <div class="w-full max-w-xs text-center">
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center justify-center gap-1 cursor-pointer font-heading font-bold text-base uppercase tracking-wider {{ Request::is('services*') ? 'text-opes-orange' : 'text-opes-nav-blue' }} list-none">
                            <span>All Services</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="mt-2 w-full rounded-md bg-gray-50 border border-gray-100 py-1 space-y-0.5 max-h-48 overflow-y-auto shadow-inner">
                            <a href="{{ route('services.index') }}" class="block px-4 py-2 font-heading font-bold text-sm uppercase tracking-wider {{ Request::is('services') ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-200' }}">
                                Overview
                            </a>

                            @if(isset($services) && $services->isNotEmpty())
                                @foreach($services as $navSrv)
                                    @if(Route::has('services.' . $navSrv->slug))
                                        <a href="{{ route('services.' . $navSrv->slug) }}" class="block px-4 py-2 font-heading font-bold text-sm uppercase tracking-wider {{ Request::is('services/' . $navSrv->slug) ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-200' }}">
                                            {{ $navSrv->title }}
                                        </a>
                                    @endif
                                @endforeach
                            @else
                                @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'custom-crm' => 'Custom CRM', 'custom-erp' => 'Custom ERP'] as $slug => $label)
                                    @if(Route::has('services.' . $slug))
                                        <a href="{{ route('services.' . $slug) }}" class="block px-4 py-2 font-heading font-bold text-sm uppercase tracking-wider {{ Request::is('services/' . $slug) ? 'text-opes-orange' : 'text-opes-nav-blue hover:bg-gray-200' }}">
                                            {{ $label }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </details>
                </div>

                <a href="{{ route('about') }}" class="font-heading font-bold text-base uppercase tracking-wider {{ Request::is('about') ? 'text-opes-orange' : 'text-opes-nav-blue' }}">About Us</a>
            </nav>
        </div>
    </header>

    <main class="w-full overflow-x-hidden">
        @yield('content')

        @if(request()->routeIs('home'))
            <div class="flex flex-col md:flex-row gap-6 lg:gap-8 mt-12 md:mt-20 max-w-7xl mx-auto px-4">
                <!-- Video Player Container -->
                <div class="flex-1 bg-white p-5 md:p-6 rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:shadow-md">
                    <div class="overflow-hidden rounded-xl">
                        @include("partials.youtube-player")
                    </div>
                </div>

                <!-- Banner Image Container -->
                <div class="flex-1 bg-white p-5 md:p-6 rounded-2xl border border-slate-100 shadow-sm transition-all duration-300 hover:shadow-md">
                    <div class="overflow-hidden rounded-xl bg-slate-50 flex items-center justify-center h-full">
                        <img src="{{ Vite::asset("resources/images/banners/opes-home.png") }}"
                            alt="Opes Home Banner"
                            class="w-full h-auto object-cover tracking-wide transition-transform duration-500 hover:scale-[1.02]" />
                    </div>
                </div>
            </div>
        @endif
    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Mobile Menu Controller
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const line1 = document.getElementById('line-1');
            const line2 = document.getElementById('line-2');
            const line3 = document.getElementById('line-3');

            menuToggle.addEventListener('click', () => {
                const isOpen = !mobileMenu.classList.contains('translate-x-full');

                if (isOpen) {
                    mobileMenu.classList.add('translate-x-full');
                    line1.classList.remove('rotate-45', 'translate-y-2');
                    line2.classList.remove('opacity-0');
                    line3.classList.remove('-rotate-45', '-translate-y-2');
                    document.body.classList.remove('overflow-hidden');
                } else {
                    mobileMenu.classList.remove('translate-x-full');
                    line1.classList.add('rotate-45', 'translate-y-2');
                    line2.classList.add('opacity-0');
                    line3.classList.add('-rotate-45', '-translate-y-2');
                    document.body.classList.add('overflow-hidden'); // Prevents background scrolling while browsing menu
                }
            });

            // Canvas Background Particles
            const canvas = document.getElementById('particle-canvas');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                let width, height, particles;

                function initCanvas() {
                    width = window.innerWidth;
                    height = window.innerHeight;
                    canvas.width = width;
                    canvas.height = height;
                    particles = [];
                    // Scaled down particle count on small mobile devices to preserve processing power/battery life
                    const count = Math.min(Math.floor((width * height) / 35000), width < 640 ? 25 : 65);
                    for (let i = 0; i < count; i++) {
                        particles.push({
                            x: Math.random() * width,
                            y: Math.random() * height,
                            vx: (Math.random() - 0.5) * 0.3,
                            vy: (Math.random() - 0.5) * 0.3,
                            radius: Math.random() * 2 + 1,
                            color: Math.random() > 0.5 ? 'rgba(234, 74, 43, 0.3)' : 'rgba(6, 182, 212, 0.3)'
                        });
                    }
                }

                function animate() {
                    ctx.clearRect(0, 0, width, height);
                    for (let i = 0; i < particles.length; i++) {
                        let p = particles[i];
                        p.x += p.vx; p.y += p.vy;
                        if (p.x < 0 || p.x > width) p.vx *= -1;
                        if (p.y < 0 || p.y > height) p.vy *= -1;
                        ctx.beginPath();
                        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                        ctx.fillStyle = p.color;
                        ctx.fill();

                        for (let j = i + 1; j < particles.length; j++) {
                            let p2 = particles[j];
                            let d = Math.sqrt(Math.pow(p.x - p2.x, 2) + Math.pow(p.y - p2.y, 2));
                            if (d < 160) {
                                ctx.beginPath();
                                ctx.moveTo(p.x, p.y);
                                ctx.lineTo(p2.x, p2.y);
                                ctx.strokeStyle = `rgba(163, 163, 163, ${0.12 * (1 - d/160)})`;
                                ctx.lineWidth = 0.6;
                                ctx.stroke();
                            }
                        }
                    }
                    requestAnimationFrame(animate);
                }
                initCanvas(); animate();
                window.addEventListener('resize', initCanvas);
            }
        });
    </script>
</body>
</html>
