@extends("layouts.app")

@section("content")
<!-- Success Feedback Overlay Trigger Banner -->
@if(session('success'))
    <div class="bg-emerald-600 text-white font-medium text-sm py-4 px-6 text-center tracking-wide shadow-inner">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-3">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<!-- Part 1: Hero Mesh Header Area -->
<section class="relative overflow-hidden py-20 md:py-28 border-b border-white/5">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(6,182,212,0.08),transparent_60%)]"></div>

    <div class="w-full max-w-[90%] xl:max-w-7xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-8 space-y-6">
            <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-opes-orange/10 border border-opes-orange/20 rounded-full text-opes-orange text-xs font-bold uppercase tracking-wider">
                @if($service->icon_class)
                    <i class="{{ $service->icon_class }}"></i>
                @else
                    <i class="fa-solid fa-layer-group"></i>
                @endif
                <span>Operational Sector Node</span>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-extrabold uppercase tracking-tight leading-none">
                {{ $service->title }}
            </h1>

            @if($service->subtitle)
                <p class="text-lg md:text-xl text-opes-text-gray font-medium max-w-3xl leading-relaxed">
                    {{ $service->subtitle }}
                </p>
            @endif
        </div>

        <!-- Operational Performance Result Metric Widget -->
        @if($service->results_summary)
            <div class="lg:col-span-4 bg-opes-navy/40 border border-white/10 p-8 rounded-xl backdrop-blur-md text-center lg:text-left space-y-2 shadow-xl">
                <p class="text-xs font-heading font-bold uppercase tracking-widest text-opes-text-gray">Validated Baseline Yield</p>
                <div class="text-2xl md:text-3xl font-heading font-black text-transparent bg-clip-text bg-gradient-to-r from-opes-cyan to-white uppercase leading-tight">
                    {{ $service->results_summary }}
                </div>
                <p class="text-xs text-opes-text-gray/80 leading-normal">Empirically recorded optimization metrics compiled across active client system deployments.</p>
            </div>
        @endif
    </div>
</section>

<!-- Part 2: Informational Content Matrix -->
<section class="w-full max-w-[90%] xl:max-w-7xl mx-auto py-16 lg:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

        <div class="lg:col-span-12 space-y-12">

            <!-- Market Context Definition Block -->
            <div class="space-y-4 max-w-4xl">
                <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">01 // Architectural Focus</h3>
                <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Platform Infrastructure Framework</h2>
                <div class="text-opes-text-gray text-base leading-relaxed space-y-6 whitespace-pre-line font-normal">
                    {{ $service->intro_text }}
                </div>
            </div>

            <hr class="border-white/10">

            <!-- Dynamic Subsystem Tactical Feature Loops Output Grid -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">02 // Core Competencies</h3>
                    <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">System Capability Matrix</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($service->features->sortBy('sort_order') as $feature)
                        <div class="group p-6 bg-opes-navy/20 hover:bg-opes-navy/50 border border-white/5 hover:border-opes-cyan/30 transition-all duration-300 rounded-xl flex gap-5 items-start">
                            <div class="w-10 h-10 rounded bg-opes-orange/10 border border-opes-orange/20 text-opes-orange group-hover:bg-opes-orange group-hover:text-white flex items-center justify-center font-bold text-xs font-mono shrink-0 transition-all duration-300">
                                {{ sprintf("%02d", $loop->iteration) }}
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-white tracking-tight uppercase group-hover:text-opes-cyan transition-colors">{{ $feature->title }}</h4>
                                <p class="text-xs md:text-sm text-opes-text-gray leading-relaxed">{{ $feature->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 p-8 bg-opes-darker border border-dashed border-white/10 rounded-xl text-center">
                            <p class="text-xs text-opes-text-gray italic">Sub-system feature variations are currently compiling for this layout vector.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Dynamic Industry Configurations Matrix (e.g., CRM & ERP) -->
            @if($service->industries && $service->industries->isNotEmpty())
                <hr class="border-white/10">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">03 // Market Adaptability</h3>
                        <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Industry Configurations</h2>
                    </div>
                    <div class="overflow-x-auto border border-white/5 rounded-xl bg-opes-navy/10 backdrop-blur-md">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b border-white/10 bg-white/5 text-xs font-bold uppercase tracking-wider text-opes-cyan">
                                    <th class="p-4 w-1/3">Industry</th>
                                    <th class="p-4 w-2/3">Specialisation</th>
                                </tr>
                            </thead>
                            <tbody class="text-xs md:text-sm text-opes-text-gray divide-y divide-white/5">
                                @foreach($service->industries->sortBy('sort_order') as $industry)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="p-4 font-bold text-white uppercase tracking-wide">{{ $industry->name }}</td>
                                        <td class="p-4 leading-relaxed">{{ $industry->specialisation }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            <!-- Dynamic Use Cases Matrix (e.g., Bulk SMS & Email) -->
            @if($service->useCases && $service->useCases->isNotEmpty())
                <hr class="border-white/10">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">04 // Practical Deployment</h3>
                        <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Functional Use Cases</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($service->useCases->sortBy('sort_order') as $useCase)
                            <div class="p-6 bg-opes-navy/20 border border-white/5 rounded-xl space-y-2">
                                <h4 class="text-sm font-bold text-opes-cyan uppercase tracking-wider font-mono">// {{ $useCase->title }}</h4>
                                <p class="text-xs md:text-sm text-opes-text-gray leading-relaxed font-light">{{ $useCase->example }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
@endsection
