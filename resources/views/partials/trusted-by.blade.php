@php
    $clientele = [
        "/opes-clientele/tanesco.png",
        "/opes-clientele/savanna.png",
        "/opes-clientele/radiomaria.png",
        "/opes-clientele/posta.png",
        "/opes-clientele/nissan.png",
        "/opes-clientele/lakegas.png",
        "/opes-clientele/equity.png",
        "/opes-clientele/crdb.png",
        "/opes-clientele/china-dasheng.png",
        "/opes-clientele/anglo-Gold.png"
    ];
@endphp

<div class="flex overflow-hidden group">
    <div class="flex animate-infinite-scroll whitespace-nowrap">
        @foreach($clientele as $url)
            <div class="w-[250px] flex-shrink-0 flex items-center justify-center px-10">
                <img
                    src="{{ asset($url) }}"
                    alt="Client Logo"
                    width="220"
                    height="56"
                    loading="lazy"
                    decoding="async"
                    class="max-h-14 w-auto object-contain transition-transform duration-500 group-hover:scale-105"
                />
            </div>
        @endphp

        @foreach($clientele as $url)
            <div class="w-[250px] flex-shrink-0 flex items-center justify-center px-10">
                <img
                    src="{{ asset($url) }}"
                    alt="Client Logo"
                    width="220"
                    height="56"
                    loading="lazy"
                    decoding="async"
                    class="max-h-14 w-auto object-contain transition-transform duration-500 group-hover:scale-105"
                />
            </div>
        @endphp
    </div>
</div>
