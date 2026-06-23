@extends('layouts.app')

@section('title', 'OPES Technologies | ICT Consultancy Firm')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[85vh] flex items-center justify-center text-center py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h1 class="text-5xl md:text-7xl font-extrabold uppercase tracking-tight mb-8 leading-tight">
                Run all your operations<br>
                <span class="text-gradient font-black">on one system.</span>
            </h1>
            <p class="text-xl md:text-2xl text-opes-text-main/80 font-light max-w-4xl mx-auto mb-12 leading-relaxed">
                Reach every customer, and connect everything in between on a single integrated platform. Designed in Tanzania.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="#contact-section" class="btn btn-primary w-full sm:w-auto">Book a Demo</a>
                <a href="https://wa.me/your-number" class="btn btn-secondary w-full sm:w-auto">Chat With Us</a>
            </div>
        </div>
    </section>

    <!-- What Sets Us Apart Section -->
    <section class="py-24 bg-opes-darker">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-4xl mx-auto mb-20">
                <h2 class="text-3xl md:text-4xl leading-tight">
                    Four things OPES Technologies does that <span class="text-opes-orange font-black">other software providers can't.</span>
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
                    <!-- Fallback Content from Copy Deck (2026) -->
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-regular fa-clock"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">In the field since 2014</h3>
                        <p class="text-opes-text-gray text-sm">12+ years experience in solving real operating problems including fuel theft, vehicles used off the books, and reaching customers at scale.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-link"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">One Ecosystem, Complete control</h3>
                        <p class="text-opes-text-gray text-sm">Telematics and Bulk SMS share one data layer, so your teams never re-key the same information twice. CRM and ERP are being built onto the same backbone.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-earth-africa"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">Made for local realities</h3>
                        <p class="text-opes-text-gray text-sm">Compliance, connectivity, and conditions handled the way it works in Tanzania. LATRA and TCRA, PAYE/NSSF/WCF payroll rules, and support are native to the platform not bolted on afterwards.</p>
                    </div>
                    <div class="bg-white/5 p-8 rounded-xl">
                        <div class="icon-wrapper"><i class="fa-solid fa-headset"></i></div>
                        <h3 class="text-lg font-bold mb-4 uppercase">24/7 Local Support, Always Online</h3>
                        <p class="text-opes-text-gray text-sm">Direct support from the OPES team in Dar es Salaam, Arusha, and Mwanza. Headquartered in Dar es Salaam, with coverage wherever you operate.</p>
                    </div>
                @endforelse
            </div>

            @include("partials.trusted-by")
        </div>
    </section>
@endsection
