@extends("layouts.app")

@section("content")
@if(session('success'))
    <div class="bg-emerald-600 text-white font-medium text-sm py-4 px-6 text-center tracking-wide shadow-inner">
        <div class="max-w-7xl mx-auto flex items-center justify-center gap-3">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

<section class="relative overflow-hidden py-20 md:py-28 border-b border-white/5">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(6,182,212,0.08),transparent_60%)]"></div>

    <div class="w-full max-w-[90%] xl:max-w-7xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-8 space-y-6">
            <div class="inline-flex items-center gap-3 px-4 py-1.5 bg-opes-orange/10 border border-opes-orange/20 rounded-full text-opes-orange text-xs font-bold uppercase tracking-wider">
                <i class="{{ $service->icon_class ?? 'fa-solid fa-layer-group' }}"></i>
                <span>Operational Sector Node</span>
            </div>

            <div class="space-y-3">
                @if($service->headline)
                    <span class="block text-xs font-mono font-bold text-opes-cyan uppercase tracking-widest">
                        // {{ $service->headline }}
                    </span>
                @endif
                <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-extrabold uppercase tracking-tight leading-none">
                    {{ $service->title }}
                </h1>
            </div>

            @if($service->strapline)
                <p class="text-lg md:text-xl text-opes-text-gray font-medium max-w-3xl leading-relaxed italic">
                    "{{ $service->strapline }}"
                </p>
            @endif
        </div>

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

<section class="w-full max-w-[90%] xl:max-w-7xl mx-auto py-16 lg:py-24 space-y-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
        <div class="lg:col-span-12 space-y-16">

            <div class="space-y-4 max-w-4xl">
                <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">01 // Architectural Focus</h3>
                <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Platform Infrastructure Framework</h2>
                <div class="text-opes-text-gray text-base leading-relaxed space-y-6 whitespace-pre-line font-normal">
                    {{ $service->message }}
                </div>
            </div>

            <hr class="border-white/10">

            <div class="space-y-6">
                <div>
                    <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">02 // Core Competencies</h3>
                    <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Service Feature Details</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($service->features as $feature)
                        <div class="group p-6 bg-opes-navy/20 hover:bg-opes-navy/50 border border-white/5 hover:border-opes-cyan/30 transition-all duration-300 rounded-xl flex gap-5 items-start">
                            <div class="w-10 h-10 rounded bg-opes-orange/10 border border-opes-orange/20 text-opes-orange group-hover:bg-opes-orange group-hover:text-white flex items-center justify-center font-bold text-xs font-mono shrink-0 transition-all duration-300">
                                @if($feature->icon_class)
                                    <i class="{{ $feature->icon_class }} text-xs"></i>
                                @else
                                    {{ sprintf("%02d", $loop->iteration) }}
                                @endif
                            </div>
                            <div class="space-y-2 flex-1">
                                <h4 class="text-sm font-bold text-white tracking-tight uppercase group-hover:text-opes-cyan transition-colors">
                                    {{ $feature->title }}
                                </h4>

                                @if(!empty($feature->content) && is_array($feature->content))
                                    <div class="space-y-2">
                                        @foreach($feature->content as $paragraph)
                                            <p class="text-xs md:text-sm text-opes-text-gray leading-relaxed">
                                                {{ $paragraph }}
                                            </p>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 p-8 bg-opes-darker border border-dashed border-white/10 rounded-xl text-center">
                            <p class="text-xs text-opes-text-gray italic">Sub-system feature variations are currently compiling for this layout vector.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            @if(!empty($service->solutions) && is_array($service->solutions))
                <hr class="border-white/10">

                <div class="space-y-6">
                    <div>
                        <h3 class="text-xs tracking-widest font-bold text-opes-cyan uppercase font-mono">03 // Dynamic Solution Examples</h3>
                        <h2 class="text-2xl md:text-3xl text-white font-extrabold uppercase tracking-tight">Tailored Execution Strategies</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($service->solutions as $solution)
                            <div class="p-6 bg-black/30 border border-white/5 rounded-xl space-y-2">
                                <h4 class="text-base font-bold text-white uppercase tracking-tight">
                                    {{ $solution['title'] ?? 'System Framework Tier' }}
                                </h4>
                                <p class="text-sm text-opes-text-gray/90 leading-relaxed">
                                    {{ $solution['description'] ?? 'No tactical details defined.' }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>

@if($service->closing_line || $service->call_to_action)
    <section>
        <div class="w-full max-w-[90%] xl:max-w-4xl mx-auto text-center space-y-8">
            @if($service->closing_line)
                <h3 class="text-xl md:text-2xl text-white font-bold tracking-tight max-w-2xl mx-auto leading-snug">
                    {{ $service->closing_line }}
                </h3>
            @endif

            @if($service->call_to_action)
                <div>
                    <a href="#inquiry-pipeline-trigger" class="inline-flex items-center gap-3 px-8 py-4 bg-opes-cyan hover:bg-opes-cyan/90 text-black font-heading font-black text-xs uppercase tracking-widest rounded-lg transition-all duration-300 shadow-lg shadow-opes-cyan/10 hover:shadow-opes-cyan/20">
                        <span>{{ $service->call_to_action }}</span>
                        <i class="fa-solid fa-arrow-down-long text-[10px]"></i>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif
@endsection
