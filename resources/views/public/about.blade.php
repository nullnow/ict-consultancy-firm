@extends('layouts.app')

@section('title', 'About Us | OPES Technologies')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Hero / Mission Section -->
            <div class="max-w-4xl mb-16">
                <h1 class="text-4xl md:text-6xl font-black mb-4">Building for Tanzania.<br><span class="text-gradient font-black">Growing Together.</span></h1>
                <p class="text-xl text-opes-text-main/80 font-light mt-4">
                    OPES exists to simplify your business—building smart, scalable systems that ease operations and accelerate digital growth for Tanzanian enterprises.
                </p>
            </div>

            <!-- Origin Story & Stats -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-24">
                <div class="lg:col-span-7 space-y-6">
                    <h3 class="text-2xl text-opes-orange uppercase tracking-wider font-bold">Our Journey</h3>
                    <p class="text-lg text-opes-text-main/90 font-light leading-relaxed border-l-4 border-opes-orange pl-6">
                        Founded in the early 2010s, we set out with a simple goal: to create technology that genuinely works for local businesses.
                    </p>
                    <p class="text-sm text-opes-text-gray leading-relaxed">
                        In 2014, we launched Tanzania's very first enterprise Bulk SMS platform. Since then, we have grown humbly and steadily alongside our clients, expanding into a full digital ecosystem that spans telematics, messaging, CRM, and robust ERP solutions.
                    </p>
                </div>

                <div class="lg:col-span-5 grid grid-cols-3 gap-4 text-center">
                    <div class="bg-white/5 p-6 rounded-lg">
                        <h4 class="text-2xl font-black text-opes-cyan">10+</h4>
                        <p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Years Regional Experience</p>
                    </div>
                    <div class="bg-white/5 p-6 rounded-lg">
                        <h4 class="text-2xl font-black text-opes-cyan">7+</h4>
                        <p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Industries Served</p>
                    </div>
                    <div class="bg-white/5 p-6 rounded-lg">
                        <h4 class="text-2xl font-black text-opes-cyan">1m+</h4>
                        <p class="text-[10px] uppercase font-bold text-opes-text-gray mt-1">Of Monthly <br /> Messages</p>
                    </div>
                </div>
            </div>

            <!-- Industries Sub-note (Optional helper text for context) -->
            <div class="mb-24 bg-white/5 p-6 rounded-xl border border-white/10">
                <p class="text-xs text-opes-text-gray text-center uppercase tracking-wider font-bold mb-2">Proudly supporting diverse sectors across the region</p>
                <p class="text-sm text-opes-text-main/80 text-center font-light">
                    Healthcare • Legal • Education • Mining • NGOs • SACCOs • Manufacturing • Government
                </p>
            </div>

            <!-- Dynamic Executive Team Section -->
            @if(isset($team) && $team->count() > 0)
                <div class="mb-24">
                    <h3 class="text-2xl text-center uppercase tracking-widest mb-12 font-bold">Our Team</h3>
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

            <!-- Core Values Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solidxl fa-solid fa-headset"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">24/7 Support</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Round-the-clock technical support to ensure smooth, uninterrupted client operations.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Enterprise-Grade Security</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Strict adherence to international data-security and strict compliance standards protects your assets.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-chart-line"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Scalable Solutions</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Carefully tailored systems designed flexibly to step up and grow right alongside your business.</p>
                    </div>
                </div>
                <div class="bg-white/5 p-6 rounded-lg flex gap-4 items-start">
                    <div class="text-opes-cyan text-xl mt-1"><i class="fa-solid fa-handshake"></i></div>
                    <div>
                        <h5 class="text-sm font-bold uppercase text-opes-text-main mb-1">Local Expertise</h5>
                        <p class="text-xs text-opes-text-gray leading-relaxed">Deep cross-industry experience that produces genuinely custom, real-world solutions.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
