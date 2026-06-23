<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OPES Technologies | Simplify your business')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

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
            h1, h2, h3, h4 { @apply font-heading font-extrabold uppercase tracking-tight; }
            .text-gradient {
                background: linear-gradient(135deg, #ffffff, #ea4a2b, #06b6d4);
                background-size: 200% 200%;
                -webkit-background-clip: text; @apply text-transparent;
            }
            .btn { @apply inline-flex items-center justify-center px-8 py-4 rounded-sm font-heading font-semibold uppercase tracking-widest text-sm transition-all duration-300; }
            .btn-primary { @apply bg-gradient-to-r from-opes-orange to-[#f97316] text-white shadow-lg hover:opacity-90 hover:-translate-y-0.5; }
            .btn-secondary { @apply bg-white/5 border border-opes-cyan text-opes-cyan backdrop-blur-sm hover:bg-opes-cyan/15 hover:text-white hover:-translate-y-0.5; }
            .glass-card { @apply bg-opes-dark/60 backdrop-blur-[25px] rounded-xl p-10 transition-all duration-300 hover:bg-opes-navy/40; }
            .icon-wrapper { @apply w-16 h-16 rounded-xl bg-opes-orange/10 flex items-center justify-center text-3xl text-opes-orange mb-6; }
            .industry-pill { @apply px-6 py-3 bg-white/5 rounded-sm font-heading font-semibold text-xs tracking-wider transition-all hover:bg-opes-cyan/20 text-opes-text-main; }
        }
    </style>
</head>
<body class="relative min-h-screen pt-24">

    <canvas id="particle-canvas" class="fixed top-0 left-0 w-full h-full -z-10 pointer-events-none opacity-40"></canvas>

    <header class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300 py-4">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex flex-col items-center">
                <span class="font-heading font-black tracking-tighter text-2xl text-opes-nav-blue">OPES</span>
                <span class="font-heading font-bold tracking-widest text-[9px] text-gray-500 -mt-1">Technologies</span>
            </a>

            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('services.index') }}" class="font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">All Services</a>
                <a href="{{ route('services.show', 'telematics') }}" class="font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services/telematics') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">Telematics</a>
                <a href="{{ route('services.show', 'crm-erp') }}" class="font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services/crm-erp') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">CRM & ERP</a>
                <a href="{{ route('services.show', 'bulk-sms') }}" class="font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('services/bulk-sms') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">Bulk SMS</a>
                <a href="{{ route('about') }}" class="font-heading font-bold text-xs uppercase tracking-wider {{ Request::is('about') ? 'text-opes-orange' : 'text-opes-nav-blue hover:text-opes-nav-blue-hover' }}">About Us</a>
            </nav>

            <div>
                <a href="#contact-section" class="bg-opes-nav-blue hover:bg-opes-nav-blue-hover text-white font-heading font-bold text-xs uppercase tracking-wider px-5 py-3 rounded-sm transition-colors">Talk to an Expert</a>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
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
                    const count = Math.min(Math.floor((width * height) / 25000), 65);
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
