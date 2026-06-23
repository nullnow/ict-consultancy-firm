<p class="mt-14 text-opes-orange text-center text-lg font-bold uppercase tracking-wider min-w-max me-6">
    Trusted By
</p>

<div class="bg-white py-4 mt-2 flex items-center overflow-hidden group" id="scroll-container">
    <div class="flex whitespace-nowrap" id="scroll-track">
        @foreach($clientele as $url)
            <div class="w-[250px] flex-shrink-0 flex items-center justify-center px-10">
                <img
                    src="{{ Vite::asset($url) }}"
                    alt="Client Logo"
                    width="220"
                    height="56"
                    loading="lazy"
                    decoding="async"
                    class="max-h-14 w-auto object-contain transition-transform duration-500 group-hover:scale-105"
                />
            </div>
        @endforeach
    </div>
</div>
