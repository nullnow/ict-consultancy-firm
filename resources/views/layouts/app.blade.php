<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OPES Technologies | Simplify Your Business')</title>

    @include("partials.favicons")

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght=600;700;800;900&family=Inter:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        opes: {
                            'dark': '#090a15',
                            'darker': '#03040b',
                            'orange': '#ea4a2b',
                            'cyan': '#06b6d4',
                            'navy': '#13152c',
                            'text-main': '#f8fafc',
                            'text-gray': '#94a3b8',
                        }
                    },
                    fontFamily: {
                        heading: ['Montserrat', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'marquee': 'marquee 30s linear infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-50%)' },
                        }
                    }
                },
                container: { center: true, padding: '2rem' },
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer components {
            body { @apply bg-opes-darker text-opes-text-main font-body leading-relaxed antialiased selection:bg-opes-orange/30 selection:text-white; }
            h1, h2, h3, h4 { @apply font-heading font-black uppercase tracking-tight; }

            .btn { @apply inline-flex items-center justify-center px-8 py-4 rounded-full font-heading font-bold uppercase tracking-wider text-xs transition-all duration-500 ease-out relative overflow-hidden w-full sm:w-auto transform hover:-translate-y-1; }
            .btn-primary { @apply bg-opes-orange text-white shadow-[0_0_30px_rgba(234,74,43,0.2)] hover:shadow-[0_0_40px_rgba(234,74,43,0.45)] hover:bg-[#ff5738]; }
            .btn-secondary { @apply bg-transparent border border-white/20 text-white backdrop-blur-sm hover:bg-white hover:text-opes-darker hover:border-white; }

            .glass-card { @apply bg-opes-dark/40 border border-white/[0.06] backdrop-blur-xl rounded-2xl p-8 transition-all duration-500 ease-out hover:border-opes-orange/30 hover:bg-opes-dark/60 shadow-[0_4px_30px_rgba(0,0,0,0.4)]; }
            .icon-wrapper { @apply w-14 h-14 rounded-2xl bg-gradient-to-br from-opes-orange/10 to-transparent border border-opes-orange/20 flex items-center justify-center text-2xl text-opes-orange mb-6 transition-all duration-500 group-hover:scale-110 group-hover:border-opes-orange/50 group-hover:shadow-[0_0_20px_rgba(234,74,43,0.2)]; }

            .text-gradient {
                background: linear-gradient(135deg, #ffffff 10%, #ea4a2b 60%, #06b6d4 100%);
                -webkit-background-clip: text;
                @apply text-transparent bg-clip-text;
            }
        }
    </style>
</head>
<body class="relative min-h-screen pt-20 sm:pt-24 overflow-x-hidden">

    <!-- Interactive Ambient Light Mesh Background -->
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-opes-orange/[0.04] rounded-full filter blur-[120px] pointer-events-none -z-20 animate-pulse-slow"></div>
    <div class="absolute top-1/3 right-1/4 w-[600px] h-[600px] bg-opes-cyan/[0.04] rounded-full filter blur-[150px] pointer-events-none -z-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    <canvas id="particle-canvas" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none opacity-40"></canvas>

    <!-- Translucent Light Navigation Layer -->
    <header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 py-2 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

            <a href="{{ route('home') }}" class="flex flex-col items-center z-50 transition-transform duration-300 hover:scale-105">
                <!-- Ensure your logo asset renders crisp contrast on a clean light layout -->
                <img src="{{ Vite::asset('resources/images/Opes-logo.png') }}" width="85" height="auto" alt="OPES Logo" />
            </a>

            <!-- Desktop Navigation Matrix -->
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="font-heading font-bold text-xs uppercase tracking-widest transition-colors duration-300 {{ Request::is('/') ? 'text-opes-orange' : 'text-slate-600 hover:text-slate-900' }}">Home</a>

                <div class="relative inline-block text-left group">
                    <button class="flex items-center gap-1.5 cursor-pointer font-heading font-bold text-xs uppercase tracking-widest transition-colors duration-300 {{ Request::is('services*') ? 'text-opes-orange' : 'text-slate-600 group-hover:text-slate-900' }}">
                        <span>Services</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform duration-300 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Desktop Dropdown Card -->
                    <div class="absolute left-0 mt-3 w-60 rounded-xl shadow-[0_10px_40px_rgba(15,23,42,0.08)] bg-white border border-slate-200/80 backdrop-blur-2xl opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 py-2">
                        <a href="{{ route('services.index') }}" class="block px-5 py-3 font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services') ? 'text-opes-orange' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                            Overview
                        </a>
                        <div class="border-t border-slate-100 my-1"></div>
                        @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'crm-erp' => 'CRM & ERP'] as $slug => $label)
                            @if(Route::has('services.' . $slug))
                                <a href="{{ route('services.' . $slug) }}" class="block px-5 py-3 font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services/' . $slug) ? 'text-opes-orange' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                                    {{ $label }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('about') }}" class="font-heading font-bold text-xs uppercase tracking-widest transition-colors duration-300 {{ Request::is('about') ? 'text-opes-orange' : 'text-slate-600 hover:text-slate-900' }}">About</a>
            </nav>

            <!-- Kinetic Hamburger Toggle Button -->
            <button id="menu-toggle" class="md:hidden flex flex-col justify-center items-center w-8 h-8 space-y-1.5 z-50 relative focus:outline-none" aria-label="Toggle Menu">
                <span id="line-1" class="w-6 h-0.5 bg-slate-900 transition-all duration-300 transform origin-center"></span>
                <span id="line-2" class="w-6 h-0.5 bg-slate-900 transition-all duration-300"></span>
                <span id="line-3" class="w-6 h-0.5 bg-slate-900 transition-all duration-300 transform origin-center"></span>
            </button>
        </div>

        <!-- Fullscreen Light Immersive Mobile Menu -->
        <div id="mobile-menu" class="fixed inset-0 bg-white/98 backdrop-blur-2xl z-40 flex flex-col justify-center items-center transition-all duration-500 cubic-bezier(0.4, 0, 0.2, 1) translate-x-full md:hidden">
            <nav class="flex flex-col items-center gap-8 text-center px-6 w-full max-h-[80vh] overflow-y-auto">
                <a href="{{ route('home') }}" class="font-heading font-black text-2xl uppercase tracking-widest {{ Request::is('/') ? 'text-opes-orange' : 'text-slate-800' }}">Home</a>

                <div class="w-full text-center max-w-xs mx-auto">
                    <details class="group [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center justify-center gap-2 cursor-pointer font-heading font-black text-2xl uppercase tracking-widest {{ Request::is('services*') ? 'text-opes-orange' : 'text-slate-800' }} list-none">
                            <span>Services</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-open:rotate-180 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="mt-4 flex flex-col gap-4 bg-slate-50 py-4 rounded-xl border border-slate-200/60 shadow-inner">
                            <a href="{{ route('services.index') }}" class="font-heading font-bold text-sm uppercase tracking-wider {{ Request::is('services') ? 'text-opes-orange' : 'text-slate-600' }}">Overview</a>
                            @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'crm-erp' => 'CRM & ERP'] as $slug => $label)
                                @if(Route::has('services.' . $slug))
                                    <a href="{{ route('services.' . $slug) }}" class="font-heading font-bold text-sm uppercase tracking-wider {{ Request::is('services/' . $slug) ? 'text-opes-orange' : 'text-slate-600' }}">{{ $label }}</a>
                                @endif
                            @endforeach
                        </div>
                    </details>
                </div>

                <a href="{{ route('about') }}" class="font-heading font-black text-2xl uppercase tracking-widest {{ Request::is('about') ? 'text-opes-orange' : 'text-slate-800' }}">About</a>
            </nav>
        </div>
    </header>

    <main class="w-full overflow-x-hidden">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Premium Exit Intent Glass Overlay -->
    <div id="exit-intent-modal" class="hidden fixed inset-0 z-[100] bg-black/80 backdrop-blur-xl flex items-center justify-center p-4 opacity-0 transition-opacity duration-500">
        <div class="glass-card max-w-md w-full relative border border-opes-orange/20 shadow-2xl text-center flex flex-col items-center transform scale-95 transition-transform duration-500">
            <button id="close-exit-modal" class="absolute top-5 right-5 text-opes-text-gray hover:text-white transition-colors duration-200" aria-label="Close Modal">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <div class="icon-wrapper bg-opes-orange/10 border-opes-orange/30">
                <i class="fa-solid fa-rocket animate-pulse"></i>
            </div>

            <h3 class="text-gradient mb-4 text-xl md:text-2xl font-black">Wait! Before You Leave</h3>
            <p class="text-opes-text-gray text-sm mb-8 max-w-xs leading-relaxed">
                Let's engineering architectural clarity across your processes. Get a tailored blueprints deployment deck from our team today.
            </p>

            <a href="{{ route('home') }}#contact-section" id="exit-modal-cta" class="btn btn-primary w-full text-center">
                Book Free Consultation
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                    document.body.classList.add('overflow-hidden');
                }
            });

            // Exit Intent Animation Controller
            const exitModal = document.getElementById('exit-intent-modal');
            const innerCard = exitModal?.querySelector('.glass-card');
            const closeExitModalBtn = document.getElementById('close-exit-modal');
            const exitCta = document.getElementById('exit-modal-cta');

            if (exitModal && innerCard) {
                const hasTriggered = sessionStorage.getItem('opes_exit_intent_triggered');

                const showModal = () => {
                    exitModal.classList.remove('hidden');
                    setTimeout(() => {
                        exitModal.classList.remove('opacity-0');
                        innerCard.classList.remove('scale-95');
                    }, 50);
                    sessionStorage.setItem('opes_exit_intent_triggered', 'true');
                };

                const hideModal = () => {
                    exitModal.classList.add('opacity-0');
                    innerCard.classList.add('scale-95');
                    setTimeout(() => exitModal.classList.add('hidden'), 500);
                };

                if (!hasTriggered) {
                    document.addEventListener('mouseleave', (event) => {
                        if (event.clientY < 15) showModal();
                    });
                }

                if (closeExitModalBtn) closeExitModalBtn.addEventListener('click', hideModal);
                exitModal.addEventListener('click', (e) => { if (e.target === exitModal) hideModal(); });
                if (exitCta) exitCta.addEventListener('click', hideModal);
            }
        });
    </script>
</body>
</html>
