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

<!-- Part 1: Strategic Architecture Hero Mesh -->
<section class="relative bg-brand-dark text-white overflow-hidden py-20 md:py-28 border-b border-slate-800">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(30,64,175,0.15),transparent_70%)]"></div>

    <div class="w-full max-w-[90%] xl:max-w-7xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-8 space-y-6">
            <div class="inline-flex items-center gap-3 px-3 py-1.5 bg-brand-blue/20 border border-brand-blue-light/30 rounded-full text-brand-blue-light text-xs font-bold uppercase tracking-wider">
                <i class="{{ $service->icon_class }}"></i>
                <span>Operational Sector Matrix Node</span>
            </div>

            <h1 class="text-3xl md:text-5xl lg:text-6xl text-white leading-none">
                {{ $service->title }}
            </h1>

            @if($service->subtitle)
                <p class="text-lg md:text-xl text-slate-300 font-medium max-w-3xl leading-relaxed">
                    {{ $service->subtitle }}
                </p>
            @endif
        </div>

        <!-- Prominent Operational Performance Result Metric Widget -->
        @if($service->results_summary)
            <div class="lg:col-span-4 bg-gradient-to-br from-brand-surface to-brand-dark border border-white/10 p-8 rounded-xl shadow-2xl text-center lg:text-left space-y-2">
                <p class="text-xs font-heading font-bold uppercase tracking-widest text-slate-400">Validated Baseline Yield</p>
                <div class="text-3xl md:text-4xl font-heading font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 uppercase">
                    {{ $service->results_summary }}
                </div>
                <p class="text-xs text-slate-400 leading-normal">Empirically recorded optimization metrics compiled across connected fleet tracking deployments.</p>
            </div>
        @endif
    </div>
</section>

<!-- Part 2: Two-Column Informational Content Matrix and Stickied Form Pipeline -->
<section class="w-full max-w-[90%] xl:max-w-7xl mx-auto py-16 lg:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">

        <!-- Left Hand Side Data Vector: Deep Dive Spec Arrays -->
        <div class="lg:col-span-7 space-y-12">

            <!-- Market Context Definition Block -->
            <div class="space-y-4">
                <h3 class="text-xs tracking-widest font-bold text-brand-blue-light uppercase font-mono">01 // Architectural Focus</h3>
                <h2 class="text-2xl text-orange-900 font-orange tracking-tight uppercase">Platform Infrastructure Framework</h2>
                <div class="text-white-600 text-base leading-relaxed space-y-6 whitespace-pre-line font-normal">
                    {{ $service->intro_text }}
                </div>
            </div>

            <hr class="border-slate-200">

            <!-- Dynamic Subsystem Tactical Feature Loops Output Grid -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xs tracking-widest font-bold text-brand-blue-light uppercase font-mono">02 // Core Competencies</h3>
                    <h2 class="text-2xl text-orange-900 font-black tracking-tight uppercase">System Capability Matrix</h2>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    @forelse($service->features->sortBy('sort_order') as $feature)
                        <div class="group p-6 bg-brand-gray-bg hover:bg-white border border-transparent hover:border-slate-200 transition-all rounded-xl flex gap-5 items-start">
                            <div class="w-10 h-10 rounded bg-white group-hover:bg-brand-blue/10 border border-slate-200 text-brand-blue group-hover:text-brand-blue-light flex items-center justify-center font-bold text-xs font-mono shrink-0 transition-colors">
                                {{ sprintf("%02d", $loop->iteration) }}
                            </div>
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-cyan-900 tracking-tight uppercase">{{ $feature->title }}</h4>
                                <p class="text-xs md:text-sm text-main-600 leading-relaxed">{{ $feature->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 bg-slate-50 border border-dashed border-slate-200 rounded-xl text-center">
                            <p class="text-xs text-slate-500 italic">Sub-system feature variations are currently compiling for this layout vector.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right Hand Side Data Vector: High Efficiency Sticky Acquisition Console -->
        <div id="request-pipeline" class="lg:col-span-5 lg:sticky lg:top-28">
            <div class="bg-brand-surface p-8 rounded-xl border border-slate-800 shadow-2xl text-white space-y-6">
                <div>
                    <h3 class="text-xl font-heading font-extrabold tracking-tight">Initialize Demo Deployment</h3>
                    <p class="text-xs text-slate-400 uppercase tracking-wider mt-1">Configure telemetry validation tracking routes instantly.</p>
                </div>

                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <!-- Tracked Pipeline Routing Flag Context -->
                    <input type="hidden" name="service_interested_in" value="{{ $service->title }}">

                    <div>
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Authorized Operative Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">
                        @error('full_name') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Corporate Email Portal</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">
                            @error('email') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Comms Line (Phone)</label>
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}" required class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">
                            @error('phone_number') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Enterprise Name</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" required class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">
                            @error('company_name') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Active Fleet Size Volume</label>
                            <input type="text" name="fleet_size" value="{{ old('fleet_size') }}" placeholder="e.g. 50+ assets" class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">
                            @error('fleet_size') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-[10px] uppercase tracking-widest font-bold text-slate-400 mb-1.5">Custom Operational Objectives / Requirements</label>
                        <textarea name="message" rows="4" placeholder="Outline explicit structural demands or performance scaling conditions..." class="w-full p-3 bg-brand-dark/50 border border-slate-700 rounded text-white text-xs focus:outline-none focus:border-brand-blue-light">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-400 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-brand-blue to-brand-blue-light hover:opacity-90 text-white text-xs font-bold uppercase tracking-widest rounded transition-all shadow-md">
                        Submit System Routing Challenge
                    </button>
                </form>

                <p class="text-[10px] text-center text-slate-500 leading-normal font-sans">
                    Submission triggers real-time pipeline alerts within our administrative system matrix. Standard processing lifecycle window: < 2 Hours.
                </p>
            </div>
        </div>

    </div>
</section>
@endsection
