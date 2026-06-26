@extends('layouts.app')

@section('title', 'Connected Enterprise Services | OPES Technologies')

@section('content')
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <!-- Main Title & Updated Intro -->
            <h1 class="text-4xl md:text-6xl font-black mb-6">Connected Solutions</h1>
            <p class="text-xl md:text-2xl text-opes-text-main/80 font-light max-w-4xl mx-auto mb-16">
                One partner. Four systems. Every part of your business, connected.
            </p>

            <!-- 2-Column Grid for the 4 Static Core Systems -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">

                <!-- System 1: Telematics & Fleet Management -->
                <div class="glass-card flex flex-col justify-between h-full p-8 bg-opes-navy/20 border border-white/5 rounded-2xl backdrop-blur-md">
                    <div>
                        <div class="text-4xl text-opes-cyan mb-6"><i class="fa-solid fa-tachograph-digital"></i></div>
                        <h3 class="text-xl font-bold mb-2 tracking-wide text-white uppercase">1. Telematics & Fleet Management</h3>
                        <p class="text-opes-cyan text-sm italic mb-6 leading-relaxed">
                            See every vehicle, every litre of fuel, and every driver decision — in real time.
                        </p>
                        <ul class="space-y-3 mb-8 text-opes-text-gray text-sm font-light">
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Live GPS tracking with full route history and playback</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Fuel monitoring with theft and siphoning alerts</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Driver behaviour scoring with AI coaching reports</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="p-4 bg-opes-cyan/5 border-l-2 border-opes-cyan rounded-r-md mb-6 text-xs text-opes-text-gray font-medium leading-relaxed">
                            <strong class="text-opes-cyan uppercase tracking-wider block text-[10px] mb-1">Benefit</strong>
                            Clients typically cut fuel costs by 20–30% within the first year.
                        </div>
                        <div class="pt-4">
                            <a href="{{ Route::has('services.telematics') ? route('services.telematics') : route('services.index') }}" class="btn btn-secondary w-full sm:w-auto text-xs py-3 px-6 uppercase font-bold tracking-wider">Further Information</a>
                        </div>
                    </div>
                </div>

                <!-- System 2: Bulk SMS & Email -->
                <div class="glass-card flex flex-col justify-between h-full p-8 bg-opes-navy/20 border border-white/5 rounded-2xl backdrop-blur-md">
                    <div>
                        <div class="text-4xl text-opes-cyan mb-6"><i class="fa-solid fa-comment-sms"></i></div>
                        <h3 class="text-xl font-bold mb-2 tracking-wide text-white uppercase">2. Bulk SMS & Email</h3>
                        <p class="text-opes-cyan text-sm italic mb-6 leading-relaxed">
                            Reach every customer instantly, on the channel they actually check.
                        </p>
                        <ul class="space-y-3 mb-8 text-opes-text-gray text-sm font-light">
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Multi-network SMS (Vodacom, Airtel, Tigo, TTCL) with two-way replies</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Drag-and-drop email campaigns with open/click tracking</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Built-in TCRA compliance, opt-out, and DND management</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="p-4 bg-opes-cyan/5 border-l-2 border-opes-cyan rounded-r-md mb-6 text-xs text-opes-text-gray font-medium leading-relaxed">
                            <strong class="text-opes-cyan uppercase tracking-wider block text-[10px] mb-1">Benefit</strong>
                            Millions of messages delivered monthly at a fraction of call-centre cost.
                        </div>
                        <div class="pt-4">
                            <a href="{{ Route::has('services.bulk-sms-email') ? route('services.bulk-sms-email') : route('services.index') }}" class="btn btn-secondary w-full sm:w-auto text-xs py-3 px-6 uppercase font-bold tracking-wider">Further Information</a>
                        </div>
                    </div>
                </div>

                <!-- System 3: Custom CRM -->
                <div class="glass-card flex flex-col justify-between h-full p-8 bg-opes-navy/20 border border-white/5 rounded-2xl backdrop-blur-md">
                    <div>
                        <div class="text-4xl text-opes-cyan mb-6"><i class="fa-solid fa-user-gear"></i></div>
                        <h3 class="text-xl font-bold mb-2 tracking-wide text-white uppercase">3. Custom CRM</h3>
                        <p class="text-opes-cyan text-sm italic mb-6 leading-relaxed">
                            One view of every customer, from first enquiry to lifetime relationship.
                        </p>
                        <ul class="space-y-3 mb-8 text-opes-text-gray text-sm font-light">
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>360° contact and account management with full interaction history</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Visual sales pipeline with conversion reporting</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>AI chatbot for 24/7 WhatsApp, SMS, and web support</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="p-4 bg-opes-cyan/5 border-l-2 border-opes-cyan rounded-r-md mb-6 text-xs text-opes-text-gray font-medium leading-relaxed">
                            <strong class="text-opes-cyan uppercase tracking-wider block text-[10px] mb-1">Benefit</strong>
                            Faster response times and higher conversion — without adding headcount.
                        </div>
                        <div class="pt-4">
                            <a href="{{ Route::has('services.custom-crm') ? route('services.custom-crm') : route('services.index') }}" class="btn btn-secondary w-full sm:w-auto text-xs py-3 px-6 uppercase font-bold tracking-wider">Further Information</a>
                        </div>
                    </div>
                </div>

                <!-- System 4: Custom ERP -->
                <div class="glass-card flex flex-col justify-between h-full p-8 bg-opes-navy/20 border border-white/5 rounded-2xl backdrop-blur-md">
                    <div>
                        <div class="text-4xl text-opes-cyan mb-6"><i class="fa-solid fa-diagram-project"></i></div>
                        <h3 class="text-xl font-bold mb-2 tracking-wide text-white uppercase">4. Custom ERP</h3>
                        <p class="text-opes-cyan text-sm italic mb-6 leading-relaxed">
                            Finance, HR, procurement, and assets — running on one connected backbone.
                        </p>
                        <ul class="space-y-3 mb-8 text-opes-text-gray text-sm font-light">
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Finance & accounting with multi-currency and PAYE/NSSF/WCF compliance</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Procurement, inventory, and full asset-lifecycle tracking</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-opes-orange mt-1 text-xs">▪</span>
                                <span>Pre-configured for Healthcare, Legal, Education, Mining, NGOs, SACCOs, Manufacturing, Government</span>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <div class="p-4 bg-opes-cyan/5 border-l-2 border-opes-cyan rounded-r-md mb-6 text-xs text-opes-text-gray font-medium leading-relaxed">
                            <strong class="text-opes-cyan uppercase tracking-wider block text-[10px] mb-1">Benefit</strong>
                            Real-time visibility from the boardroom to the warehouse floor — no month-end surprises.
                        </div>
                        <div class="pt-4">
                            <a href="{{ Route::has('services.custom-erp') ? route('services.custom-erp') : route('services.index') }}" class="btn btn-secondary w-full sm:w-auto text-xs py-3 px-6 uppercase font-bold tracking-wider">Further Information</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Dynamic Services Addendum Matrix -->
            @if(isset($services) && $services->isNotEmpty())
                @php
                    // Filter out core items cleanly using explicit unique slug maps
                    $staticSlugs = ['telematics', 'bulk-sms-email', 'custom-crm', 'custom-erp'];
                    $dynamicServices = $services->filter(fn($s) => !in_array($s->slug, $staticSlugs));
                @endphp

                @if($dynamicServices->isNotEmpty())
                    <div class="mt-24 text-left border-t border-white/10 pt-16 space-y-10">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-black text-white uppercase tracking-tight">Our Extended Infrastructure Ecosystem</h2>
                            <p class="text-sm md:text-base text-opes-text-gray/70 font-light mt-1">Explore custom telematics variations, specialized execution engines, and tactical software architectures.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            @foreach($dynamicServices as $srv)
                                <div class="glass-card flex flex-col justify-between h-full p-8 bg-opes-navy/10 border border-white/5 rounded-2xl backdrop-blur-sm">
                                    <div>
                                        <div class="flex items-center justify-between mb-5">
                                            <div class="text-3xl text-opes-cyan">
                                                <i class="{{ $srv->icon_class ?? 'fa-solid fa-gears' }}"></i>
                                            </div>
                                            @if($srv->headline)
                                                <span class="text-[10px] font-mono uppercase tracking-widest text-opes-cyan/60 bg-black/30 px-2.5 py-0.5 rounded border border-white/5">
                                                    {{ $srv->headline }}
                                                </span>
                                            @endif
                                        </div>

                                        <h4 class="text-lg font-bold text-white uppercase tracking-wide mb-2">{{ $srv->title }}</h4>

                                        @if($srv->strapline)
                                            <p class="text-opes-cyan/90 text-xs italic mb-4 font-light leading-relaxed">"{{ $srv->strapline }}"</p>
                                        @endif

                                        @if($srv->message)
                                            <p class="text-opes-text-gray text-xs md:text-sm leading-relaxed mb-6 font-light">
                                                {{ Str::limit($srv->message, 160) }}
                                            </p>
                                        @endif
                                    </div>

                                    <div>
                                        @if($srv->results_summary)
                                            <div class="p-3 bg-white/5 border-l border-opes-cyan text-[11px] text-opes-text-gray mb-5 rounded-r-md font-medium">
                                                <span class="block text-[9px] uppercase font-bold text-opes-cyan tracking-widest mb-0.5">Target Metric</span>
                                                {{ $srv->results_summary }}
                                            </div>
                                        @endif
                                        <div class="pt-2">
                                            <a href="{{ Route::has('services.' . $srv->slug) ? route('services.' . $srv->slug) : route('services.index') }}" class="text-xs text-white font-bold tracking-wider uppercase border-b border-opes-cyan/40 pb-1 hover:text-opes-cyan hover:border-opes-cyan transition-all">
                                                Explore Specifications →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

            <!-- Global Strategic Closing Block -->
            <div class="mt-24 max-w-4xl mx-auto border-t border-white/10 pt-12 text-center space-y-4">
                <p class="text-lg md:text-xl text-opes-text-gray font-light leading-relaxed">
                    Whatever you run — a fleet, a hospital, a bank, or a cooperative — <span class="text-white font-medium">OPES brings it together in one ecosystem.</span>
                </p>
                <p class="text-2xl font-black text-opes-cyan uppercase tracking-widest pt-2">
                    Simplify your business.
                </p>
            </div>
        </div>
    </section>
@endsection
