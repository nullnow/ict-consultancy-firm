<div class="mt-32 pt-16 border-t border-white/[0.04]">
    <p class="text-center font-heading font-black text-[10px] uppercase tracking-widest text-opes-text-gray/50 mb-12">
        Trusted by leading organizations across East Africa and beyond.
    </p>

    <div class="max-w-4xl mx-auto grid grid-cols-3 gap-8 items-center justify-items-center px-4">
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
