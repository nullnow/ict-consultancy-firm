<div id="clients-laser-section" class="relative mt-32 pt-16 border-t border-white/[0.04]">
    <canvas id="laser-canvas" class="absolute inset-0 z-0 pointer-events-none opacity-70"></canvas>

    <p class="relative z-10 text-center font-heading font-black text-[10px] uppercase tracking-widest text-opes-text-gray/50 mb-12">
        Trusted by leading organizations across East Africa and beyond.
    </p>

    <div class="relative z-10 max-w-4xl mx-auto grid grid-cols-3 gap-8 items-center justify-items-center px-4">
        @foreach($clientele as $url)
            <div class="relative w-full group">

                <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500 via-pink-500 via-cyan-400 to-yellow-400 rounded-xl opacity-0 blur-md transition-all duration-500 ease-out group-hover:opacity-100 group-hover:scale-x-[1.05] group-hover:scale-y-[1.03] group-hover:-rotate-1 group-hover:skew-x-2 pointer-events-none z-0"></div>

                <div class="relative w-full aspect-[4/3] max-h-32 flex items-center justify-center bg-white border border-slate-200/60 rounded-xl p-6 transition-all duration-300 shadow-sm group-hover:shadow-2xl group-hover:border-transparent z-10">
                    <img
                        src="{{ Vite::asset($url) }}"
                        alt="Client Identity"
                        width="160"
                        height="45"
                        loading="lazy"
                        decoding="async"
                        class="max-h-12 w-auto object-contain transition-all duration-300 filter grayscale opacity-60 contrast-125 group-hover:grayscale-0 group-hover:opacity-100 group-hover:contrast-100 drop-shadow-[0_0_1px_rgba(0,0,0,0.15)] group-hover:drop-shadow-none"
                    />
                </div>

            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('clients-laser-section');
        const canvas = document.getElementById('laser-canvas');

        // Safety check to ensure elements exist on the page
        if (!container || !canvas) return;

        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
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
        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            targetX = ((e.clientX - rect.left) / rect.width - 0.5) * 30;
        });

        // Gently return targetX back to neutral when mouse leaves the client grid
        container.addEventListener('mouseleave', () => {
            targetX = 0;
        });

        function render() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            lasers.forEach(laser => {
                laser.update();
                laser.y += (targetX * 0.02);

                // Keep laser Y coordinates bounded within canvas thresholds
                if (laser.y < -100) laser.y = canvas.height + 100;
                if (laser.y > canvas.height + 100) laser.y = -100;

                laser.draw();
            });

            requestAnimationFrame(render);
        }
        render();
    });
</script>
