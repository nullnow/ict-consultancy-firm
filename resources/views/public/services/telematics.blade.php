@extends('layouts.app')

@section('title', ($service->title ?? 'Telematics & Fleet Intelligence') . ' | OPES Technologies')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-16">
                <h1 class="text-4xl md:text-6xl font-black mb-4">{{ $service->title ?? 'Telematics That Actually Works for Tanzanian Roads' }}</h1>
                <p class="text-opes-cyan font-heading font-bold uppercase tracking-widest text-lg">{{ $service->subtitle ?? 'Live Visibility. Total Control.' }}</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <div class="lg:col-span-7 space-y-6">
                    <h3 class="text-xl uppercase tracking-wider text-opes-text-main">The Logistical Realities</h3>
                    <p class="text-opes-text-gray leading-relaxed text-base">
                        {{ $service->intro_text ?? 'Tanzanian fleet operators face rising fuel costs, cargo theft, harsh road conditions, and strict LATRA compliance requirements. Without real-time visibility, these challenges erode margins silently — until they become crises.' }}
                    </p>

                    <div class="bg-white/5 p-8 rounded-xl mt-8">
                        <h4 class="text-lg text-opes-orange mb-6 uppercase tracking-wider font-bold">The OPES Solution Capabilities</h4>
                        <div class="space-y-6">
                            @if(isset($service) && $service->features->count() > 0)
                                @foreach($service->features as $feat)
                                    <div class="flex items-start gap-4">
                                        <div class="text-opes-cyan text-xl mt-1"><i class="{{ $feat->icon_class ?? 'fa-solid fa-circle-nodes' }}"></i></div>
                                        <div>
                                            <h5 class="text-base font-bold text-opes-text-main uppercase mb-1">{{ $feat->title }}</h5>
                                            <p class="text-sm text-opes-text-gray leading-relaxed">{{ $feat->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex items-start gap-4">
                                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-location-dot"></i></div>
                                    <div>
                                        <h5 class="text-base font-bold text-opes-text-main uppercase mb-1">Live Location Intelligence</h5>
                                        <p class="text-sm text-opes-text-gray">Real-time GPS tracking on high-resolution mapping infrastructure, route history log playbacks, and intelligent geofencing triggers.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-gas-pump"></i></div>
                                    <div>
                                        <h5 class="text-base font-bold text-opes-text-main uppercase mb-1">Fuel Theft Protection Engineering</h5>
                                        <p class="text-sm text-opes-text-gray">Capacitive internal fuel probes running at ±1% precision levels paired with structural diagnostic alarms for sudden fuel drops.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-6">
                    <div class="glass-card text-center bg-opes-navy/30">
                        <h4 class="text-xl mb-4 tracking-wide text-opes-text-main">Verified Operations Statistics</h4>
                        <p class="text-3xl font-black text-opes-orange uppercase my-4">Under 90 Days</p>
                        <p class="text-sm text-opes-text-gray leading-relaxed mb-6">
                            Average return-on-investment timeline experienced by bulk enterprise logistics firms following infrastructure implementation.
                        </p>
                        <div class="text-left bg-black/30 p-4 rounded-md space-y-2 text-xs text-opes-text-gray">
                            <p><strong class="text-opes-cyan">30%</strong> Average localized reduction in raw fuel theft events.</p>
                            <p><strong class="text-opes-cyan">45%</strong> Decrease in unauthorized out-of-route equipment usage.</p>
                        </div>
                    </div>
                    <div class="pt-4">
                        <a href="#contact-section" class="btn btn-primary w-full text-center">Schedule Live Fleet Demonstration</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
