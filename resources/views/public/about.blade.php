@extends('layouts.app')

@section('title', 'About Our Infrastructure & Vision | OPES Technologies')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-4xl mb-16">
                <h1 class="text-4xl md:text-6xl font-black mb-4">Tanzanian-Built.<br><span class="text-gradient font-black">Tanzanian-Proven.</span></h1>
                <p class="text-xl text-opes-text-main/80 font-light mt-4">
                    We engineer reliable, scalable backend ecosystems to simplify operations and accelerate digital growth across East African enterprises.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-24">
                <div class="lg:col-span-7 space-y-6">
                    <h3 class="text-2xl text-opes-orange uppercase tracking-wider font-bold">Our Operational Mission</h3>
                    <p class="text-lg text-opes-text-main/90 font-light leading-relaxed border-l-4 border-opes-orange pl-6">
                        OPES simplifies enterprise management workflows. We construct intelligent digital layers that unify boardroom financial analysis with real-time operational workflows.
                    </p>
                    <p class="text-sm text-opes-text-gray leading-relaxed">
                        Founded in 2013, OPES launched Tanzania's first truly enterprise-grade Bulk SMS engine in 2014. Over the past decade, we have systematically expanded our stack to include advanced fleet telematics platforms, bespoke customer matrices, and multi-tenant ERP configurations.
                    </p>
                </div>

                <div class="lg:col-span-5 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white/5 p-6 rounded-lg"><h4 class="text-2xl font-black text-opes-cyan">10+</h4><p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Years Experience</p></div>
                    <div class="bg-white/5 p-6 rounded-lg"><h4 class="text-2xl font-black text-opes-cyan">7+</h4><p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Sectors Covered</p></div>
                    <div class="bg-white/5 p-6 rounded-lg"><h4 class="text-2xl font-black text-opes-cyan">10M+</h4><p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Monthly Events</p></div>
                </div>
            </div>

            @if(isset($team) && $team->count() > 0)
                <div class="mb-24">
                    <h3 class="text-2xl text-center uppercase tracking-widest mb-12 font-bold">Executive Operations Team</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($team as $member)
                            <div class="bg-white/5 p-6 rounded-xl flex flex-col items-center text-center">
                                <div class="w-24 h-24 rounded-full bg-opes-navy flex items-center justify-center text-3xl text-opes-cyan mb-4">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                                <h5 class="text-base font-bold text-opes-text-main uppercase mb-1">{{ $member->name }}</h5>
                                <p class="text-xs text-opes-orange uppercase font-bold tracking-wider mb-3">{{ $member->role }}</p>
                                <p class="text-xs text-opes-text-gray leading-relaxed">{{ $member->bio }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-clock-rotate-left"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">24/7/365 On-Call Support</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Direct connection to level-3 operations engineers stationed regionally across major metropolitan hubs.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Enterprise Data Governance</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">System-wide encryption mechanisms satisfying international information-security and payload transmission compliance standards.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-arrow-trend-up"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Modular Vertical Scaling</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Database layouts built to seamlessly absorb exponential event metrics as organizational capacity grows.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-map-location-dot"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Deep Local Domain Experience</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Every integration reflects direct engagement with East African commercial workflows and transport networks.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
