@extends('layouts.app')

@section('title', 'OPES Technologies | One Connected Enterprise Platform for Tanzania')

@section('content')
    <section class="relative min-h-[85vh] flex items-center justify-center text-center py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-5xl md:text-7xl font-extrabold uppercase tracking-tight mb-8 leading-tight">
                One Ecosystem.<br>
                <span class="text-gradient font-black">Infinite Possibilities.</span><br>
                Simplified.
            </h1>
            <p class="text-xl md:text-2xl text-opes-text-main/80 font-light max-w-4xl mx-auto mb-12 leading-relaxed">
                Telematics, messaging, CRM, and ERP — built by Tanzanians, for Tanzanian enterprises, in one connected platform.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="#contact-section" class="btn btn-primary w-full sm:w-auto">Simplify Your Business</a>
                <a href="{{ route('services.index') }}" class="btn btn-secondary w-full sm:w-auto">Explore Services Matrix</a>
            </div>
        </div>
    </section>

    <section class="py-24 bg-opes-darker">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-20">
                <h2 class="text-3xl md:text-4xl leading-tight">
                    Four reasons operators across Tanzania trust OPES to <span class="text-opes-orange font-black">simplify your business.</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($differentiators as $item)
                    <div class="bg-white/5 p-8 rounded-xl transition-all duration-300 hover:bg-opes-navy/30">
                        <div class="icon-wrapper">
                            <i class="{{ $item->icon_class ?? 'fa-solid fa-square-check' }}"></i>
                        </div>
                        <h3 class="text-lg font-bold mb-4 tracking-tight uppercase text-opes-text-main">{{ $item->title }}</h3>
                        <p class="text-opes-text-gray text-sm leading-relaxed">{{ $item->description }}</p>
                    </div>
                @empty
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-regular fa-clock"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">10+ Years Local Experience</h3>
                        <p class="text-opes-text-gray text-sm">Solving real Tanzanian operating problems — fuel theft, PAYE compliance, SMS delivery — not theoretical ones.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-link"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">One Unified Ecosystem</h3>
                        <p class="text-opes-text-gray text-sm">Telematics, messaging, CRM, and ERP run on one data layer, so your teams never re-key information.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-earth-africa"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">Built for Tanzania</h3>
                        <p class="text-opes-text-gray text-sm">TCRA and LATRA compliance, PAYE/NSSF/WCF payroll rules, and Swahili support are fully native.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-headset"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">24/7 Expert Support</h3>
                        <p class="text-opes-text-gray text-sm">Real engineers in Dar es Salaam, Arusha, and Mwanza answer the phone natively — not external call centers.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
