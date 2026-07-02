@extends('layouts.app')

@section('title', 'OPES Technologies | ICT Consultancy Firm')

@section('content')
    @include("partials.hero")

    <!-- Capabilities Matrix Section -->
    <section class="py-32 bg-opes-darker/60 border-y border-white/[0.04] relative">
        <div class="max-w-7xl mx-auto px-6">

            @if(request()->routeIs('home'))
                <div class="flex flex-col md:flex-row gap-8 mt-10 mb-10 md:mt-16 md:mb-16 max-w-7xl mx-auto px-6">
                    <div class="flex-1 bg-opes-dark/30 border border-white/[0.05] p-6 rounded-2xl backdrop-blur-md shadow-2xl transition-all duration-500 hover:border-white/10">
                        <p class="text-opes-orange text-xs font-heading font-black uppercase tracking-widest mb-3">Architectural Advantages</p>
                        <h2 class="text-3xl sm:text-5xl leading-[1.05]">
                            Engineered metrics where legacy platforms <span class="text-white font-black underline decoration-opes-orange decoration-4 underline-offset-8">fall short.</span>
                        </h2>
                    </div>

                    <div class="flex-1 bg-opes-dark/30 border border-white/[0.05] p-6 rounded-2xl backdrop-blur-md shadow-2xl transition-all duration-500 hover:border-white/10">
                        <div class="overflow-hidden rounded-xl bg-black">
                            @include("partials.youtube-player")
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 group/grid">
                <!-- Card Item -->
                <div class="glass-card group flex flex-col justify-between transition-all duration-500 hover:scale-[1.02]">
                    <div>
                        <div class="icon-wrapper"><i class="fa-regular fa-clock"></i></div>
                        <h3 class="text-base font-heading font-black mb-3 tracking-wide text-white group-hover:text-opes-orange transition-colors duration-300">In the field since 2014</h3>
                        <p class="text-opes-text-gray text-xs leading-relaxed">Over a decade tracking, securing, and scaling complex logistics layers, containing fuel loss loops, and executing high-volume cellular transmissions native to East Africa.</p>
                    </div>
                </div>

                <!-- Card Item -->
                <div class="glass-card group flex flex-col justify-between transition-all duration-500 hover:scale-[1.02]">
                    <div>
                        <div class="icon-wrapper"><i class="fa-solid fa-link"></i></div>
                        <h3 class="text-base font-heading font-black mb-3 tracking-wide text-white group-hover:text-opes-orange transition-colors duration-300">Unified Data Engine</h3>
                        <p class="text-opes-text-gray text-xs leading-relaxed">Telematics architecture and high-velocity messaging sit seamlessly on a singular operational stack. Zero double-keying or detached sync layers.</p>
                    </div>
                </div>

                <!-- Card Item -->
                <div class="glass-card group flex flex-col justify-between transition-all duration-500 hover:scale-[1.02]">
                    <div>
                        <div class="icon-wrapper"><i class="fa-solid fa-earth-africa"></i></div>
                        <h3 class="text-base font-heading font-black mb-3 tracking-wide text-white group-hover:text-opes-orange transition-colors duration-300">Hyper-Local Compliance</h3>
                        <p class="text-opes-text-gray text-xs leading-relaxed">Built inline with native systems parameters. Direct matching workflows for LATRA, TCRA telemetry rules, and localized PAYE / TRA tax rules.</p>
                    </div>
                </div>

                <!-- Card Item -->
                <div class="glass-card group flex flex-col justify-between transition-all duration-500 hover:scale-[1.02]">
                    <div>
                        <div class="icon-wrapper"><i class="fa-solid fa-headset"></i></div>
                        <h3 class="text-base font-heading font-black mb-3 tracking-wide text-white group-hover:text-opes-orange transition-colors duration-300">24/7 Field Engineering</h3>
                        <p class="text-opes-text-gray text-xs leading-relaxed">On-premise support nodes anchored directly inside major trade hubs—Dar es Salaam, Arusha, and Mwanza. Instant physical and network failover support.</p>
                    </div>
                </div>
            </div>

            <!-- Client Logotype Marquee Module -->
            @include("partials.trusted-by")
        </div>
    </section>
@endsection
