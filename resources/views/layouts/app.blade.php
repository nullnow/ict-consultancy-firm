<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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

            /* Disable hardware default cursor for desktop layouts */
            @media (min-width: 768px) {
                html, body, a, button, summary, input, select, textarea {
                    cursor: none !important;
                }
            }
        }
    </style>
</head>
<body class="relative min-h-screen pt-20 sm:pt-24 overflow-x-hidden w-full max-w-full">

    <div id="custom-dot" class="fixed top-0 left-0 w-2 h-2 bg-opes-orange rounded-full pointer-events-none z-[9999] -translate-x-1/2 -translate-y-1/2 hidden md:block"></div>
    <div id="custom-ring" class="fixed top-0 left-0 w-7 h-7 border-2 border-opes-cyan/70 rounded-full pointer-events-none z-[9998] -translate-x-1/2 -translate-y-1/2 hidden md:block will-change-transform transition-all duration-75 ease-out"></div>

    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-opes-orange/[0.04] rounded-full filter blur-[120px] pointer-events-none -z-20 animate-pulse-slow"></div>
    <div class="absolute top-1/3 right-1/4 w-[600px] h-[600px] bg-opes-cyan/[0.04] rounded-full filter blur-[150px] pointer-events-none -z-20 animate-pulse-slow" style="animation-delay: 2s;"></div>
    <canvas id="particle-canvas" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none opacity-40"></canvas>

    <header class="fixed top-0 left-0 w-full z-50 bg-white border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">

            <a href="{{ route('home') }}" class="z-50 flex items-center">
                <img src="{{ Vite::asset('resources/images/Opes-logo.png') }}" width="85" alt="OPES Logo" />
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="font-bold text-xs uppercase text-gray-600 hover:text-black {{ Request::is('/') ? 'text-opes-orange' : '' }}">Home</a>

                <div class="relative group">
                    <button class="flex items-center gap-1 font-bold text-xs uppercase text-gray-600 hover:text-black {{ Request::is('services*') ? 'text-opes-orange' : '' }}">
                        <span>Services</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-md hidden group-hover:block z-50 py-1">
                        <a href="{{ route('services.index') }}" class="block px-4 py-2 text-xs font-bold uppercase text-gray-600 hover:bg-gray-50 {{ Request::is('services') ? 'text-opes-orange' : '' }}">Overview</a>
                        @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'crm-erp' => 'CRM & ERP'] as $slug => $label)
                            @if(Route::has('services.' . $slug))
                                <a href="{{ route('services.' . $slug) }}" class="block px-4 py-2 text-xs font-bold uppercase text-gray-600 hover:bg-gray-50 {{ Request::is('services/' . $slug) ? 'text-opes-orange' : '' }}">{{ $label }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('about') }}" class="font-bold text-xs uppercase text-gray-600 hover:text-black {{ Request::is('about') ? 'text-opes-orange' : '' }}">About</a>
            </nav>

            <button id="menu-toggle" class="md:hidden z-50 p-2 focus:outline-none" aria-label="Toggle Menu">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path id="menu-path" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="fixed inset-0 h-screen w-full bg-white z-40 hidden flex-col justify-center items-center">
            <nav class="flex flex-col items-center gap-8 text-center w-full px-6">
                <a href="{{ route('home') }}" class="text-2xl font-black uppercase text-gray-800 {{ Request::is('/') ? 'text-opes-orange' : '' }}">Home</a>

                <div class="w-full max-w-xs mx-auto">
                    <details class="group">
                        <summary class="flex items-center justify-center gap-2 cursor-pointer text-2xl font-black uppercase text-gray-800 list-none {{ Request::is('services*') ? 'text-opes-orange' : '' }}">
                            <span>Services</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-open:rotate-180 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>
                        <div class="mt-4 flex flex-col gap-4 bg-gray-50 py-4 rounded-xl border border-gray-200">
                            <a href="{{ route('services.index') }}" class="font-bold text-sm uppercase text-gray-600 {{ Request::is('services') ? 'text-opes-orange' : '' }}">Overview</a>
                            @foreach(['telematics' => 'Telematics', 'bulk-sms-email' => 'Bulk SMS & Email', 'crm-erp' => 'CRM & ERP'] as $slug => $label)
                                @if(Route::has('services.' . $slug))
                                    <a href="{{ route('services.' . $slug) }}" class="font-bold text-sm uppercase text-gray-600 {{ Request::is('services/' . $slug) ? 'text-opes-orange' : '' }}">{{ $label }}</a>
                                @endif
                            @endforeach
                        </div>
                    </details>
                </div>

                <a href="{{ route('about') }}" class="text-2xl font-black uppercase text-gray-800 {{ Request::is('about') ? 'text-opes-orange' : '' }}">About</a>
            </nav>
        </div>
    </header>

    <main class="w-full relative z-10">
        @yield('content')
    </main>

    @include('partials.footer')

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
            // Navbar Toggle Strategy Action
            const menuToggle = document.getElementById('menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuPath = document.getElementById('menu-path');

            const hamburgerPath = "M4 6h16M4 12h16M4 18h16";
            const closePath = "M6 18L18 6M6 6l12 12";

            if (menuToggle && mobileMenu && menuPath) {
                menuToggle.addEventListener('click', () => {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        mobileMenu.classList.add('flex');
                        menuPath.setAttribute('d', closePath);
                        document.body.classList.add('overflow-hidden');
                    } else {
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('flex');
                        menuPath.setAttribute('d', hamburgerPath);
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            }

            // Exit Intent Controller
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

            // Universal Custom Motion Cursor Matrix
            const dot = document.getElementById('custom-dot');
            const ring = document.getElementById('custom-ring');

            if (dot && ring && window.innerWidth >= 768) {
                let ringX = 0, ringY = 0;
                let mouseX = 0, mouseY = 0;

                // Track immediate coordinates across viewport tracking
                window.addEventListener('mousemove', (e) => {
                    mouseX = e.clientX;
                    mouseY = e.clientY;

                    dot.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%)`;
                });

                // Linear interpolation logic for smooth, trailing ring physics
                const renderCursorPhysics = () => {
                    ringX += (mouseX - ringX) * 0.15;
                    ringY += (mouseY - ringY) * 0.15;

                    ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;
                    requestAnimationFrame(renderCursorPhysics);
                };
                requestAnimationFrame(renderCursorPhysics);

                // Setup interactive structural expansion triggers (Buttons, Links, Dropdowns)
                const interactiveSelectors = 'a, button, summary, input, select, textarea, .btn, [role="button"]';

                const addHoverEffects = () => {
                    document.querySelectorAll(interactiveSelectors).forEach(element => {
                        // Check if listener tags are missing to prevent stacking
                        if (!element.dataset.cursorBound) {
                            element.dataset.cursorBound = "true";

                            element.addEventListener('mouseenter', () => {
                                ring.classList.remove('w-7', 'h-7', 'border-opes-cyan/70');
                                ring.classList.add('w-12', 'h-12', 'border-opes-orange', 'bg-opes-orange/10');
                                dot.classList.add('scale-75', 'bg-opes-cyan');
                            });

                            element.addEventListener('mouseleave', () => {
                                ring.classList.add('w-7', 'h-7', 'border-opes-cyan/70');
                                ring.classList.remove('w-12', 'h-12', 'border-opes-orange', 'bg-opes-orange/10');
                                dot.classList.remove('scale-75', 'bg-opes-cyan');
                            });
                        }
                    });
                };

                // Run init configuration
                addHoverEffects();

                // Dynamic Observer to handle dynamic content loads seamlessly
                const observer = new MutationObserver(addHoverEffects);
                observer.observe(document.body, { childList: true, subtree: true });
            }
        });
    </script>
</body>
</html>
