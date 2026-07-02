<style>
    @keyframes textDistort {
        0%, 100% {
            text-shadow: 2px -1px 0 #06b6d4, -2px 1px 0 #ea4a2b;
            transform: skew(0deg);
        }
        20% {
            text-shadow: -3px 2px 0 #06b6d4, 3px -2px 0 #ea4a2b;
            transform: skew(-1deg);
        }
        40% {
            text-shadow: 2px 1px 0 #06b6d4, -1px -2px 0 #ea4a2b;
            transform: skew(1deg);
        }
        60% {
            text-shadow: -1px -1px 0 #06b6d4, 2px 2px 0 #ea4a2b;
            transform: skew(-0.5deg);
        }
        80% {
            text-shadow: 3px -1px 0 #06b6d4, -3px 1px 0 #ea4a2b;
            transform: skew(0.5deg);
        }
    }

    .distorted-word {
        display: inline-block;
        animation: textDistort 1.5s infinite linear;
        position: relative;
    }

    /* Extra subtle digital glitch line overlay */
    .distorted-word::after {
        content: attr(data-text);
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        clip: rect(44px, 450px, 56px, 0);
        animation: glitch-line 3s infinite linear alternate-reverse;
    }

    @keyframes glitch-line {
        0% { clip: rect(12px, 9999px, 25px, 0); }
        50% { clip: rect(65px, 9999px, 70px, 0); }
        100% { clip: rect(3px, 9999px, 15px, 0); }
    }
</style>

<section id="hero-section" class="relative min-h-[95vh] flex items-center justify-center text-center py-24 px-6 overflow-hidden bg-cover bg-center" style="background-image: url('{{ Vite::asset("resources/images/banners/opes-home.png") }}');">

    <div class="absolute inset-0 bg-gradient-to-br from-[#03040b]/95 via-[#090a15]/85 to-[#03040b]/95 z-0"></div>

    <canvas id="laser-canvas" class="absolute inset-0 z-10 pointer-events-none opacity-70"></canvas>

    <div class="max-w-5xl mx-auto relative z-20 space-y-8 balance-text">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/[0.03] border border-white/[0.08] backdrop-blur-md mb-4 transform transition-all duration-500 hover:border-[#ea4a2b]/50 hover:bg-white/[0.06] cursor-pointer group">
            <span class="w-2 h-2 rounded-full bg-[#ea4a2b] animate-pulse-slow shadow-[0_0_10px_#ea4a2b]"></span>
            <span class="text-[10px] uppercase tracking-widest font-heading font-extrabold text-white/80 transition-colors">Simplify Your Business</span>
        </div>

        <h3 class="text-xl sm:text-3xl md:text-4xl lg:text-6xl font-heading font-black uppercase tracking-tight leading-[0.95] cursor-default select-none">
            <span class="block text-[#f8fafc]">
                Run your complete
            </span>
            <span class="block mt-3 text-[#f8fafc]">
                <span class="distorted-word text-[#ea4a2b]" data-text="operations">operations</span> on one system.
            </span>
        </h3>

        <p class="text-base sm:text-lg md:text-xl text-[#94a3b8] font-body font-normal max-w-3xl mx-auto leading-relaxed drop-shadow-sm">
            Reach every customer, and connect everything in between on a single integrated platform.
            <span class="block mt-2 font-medium text-[#06b6d4]">Designed in Tanzania.</span>
        </p>

        <div class="flex flex-col sm:flex-row gap-5 justify-center items-center pt-6">
            <a href="#contact-section" class="group relative px-8 py-4 w-full sm:w-auto rounded-xl bg-gradient-to-r from-[#ea4a2b] to-orange-500 text-white font-heading font-bold transition-all duration-300 hover:scale-105 hover:shadow-[0_0_25px_rgba(234,74,43,0.4)] text-center overflow-hidden">
                <span class="relative z-10">Request Live Demo</span>
                <div class="absolute inset-0 -translate-x-full group-hover:translate-x-0 bg-gradient-to-r from-orange-500 to-[#ea4a2b] transition-transform duration-300 ease-out -z-0"></div>
            </a>

            <a href="https://wa.me/255798888997" target="_blank" class="group px-8 py-4 w-full sm:w-auto rounded-xl bg-white/[0.04] border border-white/[0.08] text-white font-heading font-bold backdrop-blur-sm transition-all duration-300 hover:bg-white/[0.08] hover:border-[#06b6d4]/50 text-center flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-emerald-400 text-xl transition-transform group-hover:scale-110"></i>
                <span>Consult Engineering</span>
            </a>
        </div>
    </div>

    <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff01_1px,transparent_1px),linear-gradient(to_bottom,#ffffff02_1px,transparent_1px)] bg-[size:50px_50px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_50%,#000_60%,transparent_100%)] pointer-events-none z-10"></div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const hero = document.getElementById('hero-section');
        const canvas = document.getElementById('laser-canvas');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = hero.offsetWidth;
            canvas.height = hero.offsetHeight;
        }
        resizeCanvas();
        window.addEventListener('resize', resizeCanvas);

        // Define system theme colors explicitly for the lasers
        const laserColors = ['#ea4a2b', '#06b6d4'];
        const lasers = [];
        const maxLasers = 8;

        class LaserBeam {
            constructor() {
                this.reset();
                this.y = Math.random() * canvas.height;
                this.progress = Math.random();
            }

            reset() {
                this.type = Math.random() > 0.5 ? 'horizontal' : 'angled';
                this.color = laserColors[Math.floor(Math.random() * laserColors.length)];
                this.speed = 0.003 + Math.random() * 0.004;
                this.progress = 0;
                this.width = 1 + Math.random() * 2;
                this.y = Math.random() * canvas.height;
                this.angleOffset = (Math.random() - 0.5) * 150;
            }

            update() {
                this.progress += this.speed;
                if (this.progress > 1) {
                    this.reset();
                }
            }

            draw() {
                let alpha = Math.sin(this.progress * Math.PI) * 0.4;

                ctx.save();
                ctx.globalAlpha = alpha;
                ctx.lineWidth = this.width;

                ctx.shadowBlur = 15;
                ctx.shadowColor = this.color;
                ctx.strokeStyle = this.color;

                ctx.beginPath();
                if (this.type === 'horizontal') {
                    ctx.moveTo(0, this.y);
                    ctx.lineTo(canvas.width, this.y);
                } else {
                    ctx.moveTo(0, this.y - this.angleOffset);
                    ctx.lineTo(canvas.width, this.y + this.angleOffset);
                }
                ctx.stroke();
                ctx.restore();
            }
        }

        for (let i = 0; i < maxLasers; i++) {
            lasers.push(new LaserBeam());
        }

        let targetX = 0;
        hero.addEventListener('mousemove', (e) => {
            const rect = hero.getBoundingClientRect();
            targetX = ((e.clientX - rect.left) / rect.width - 0.5) * 30;
        });

        function render() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            lasers.forEach(laser => {
                laser.update();
                laser.y += (targetX * 0.02);
                laser.draw();
            });

            requestAnimationFrame(render);
        }
        render();
    });
</script>
