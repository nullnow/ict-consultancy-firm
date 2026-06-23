@extends('layouts.app')

@section('title', ($service->title ?? 'Custom CRM & ERP Architecture') . ' | OPES Technologies')

@section('content')
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-12">
                <h1 class="text-4xl md:text-6xl font-black mb-4">{{ $service->title ?? 'CRM & ERP Built for How Tanzania Works' }}</h1>
                <p class="text-opes-cyan font-heading font-bold uppercase tracking-widest text-lg">{{ $service->subtitle ?? 'One Ecosystem. Infinite Possibilities.' }}</p>
            </div>

            <div class="bg-gradient-to-r from-opes-navy/40 to-transparent p-10 rounded-xl mb-16">
                <p class="text-xl md:text-2xl text-opes-text-main font-light leading-relaxed max-w-5xl">
                    Most global CRM and ERP platforms are architected for highly integrated Western contexts, then awkwardly retrofitted into sub-Saharan operations. <span class="text-opes-orange font-bold">OPES designs from the ground up</span> — supporting multi-branch distributed architectures, regional tax logic compliance, and native transactional messaging channels out of the box.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white/5 p-8 rounded-xl">
                    <h3 class="text-xl text-opes-orange mb-6 uppercase tracking-wider"><i class="fa-solid fa-users mr-3"></i>Enterprise Customer Relationship Suite</h3>
                    <ul class="space-y-4 text-opes-text-gray text-base">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-cyan mt-1 text-xs"></i> Omnichannel Contact & Account Matrix Mapping</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-cyan mt-1 text-xs"></i> B2B Enterprise Sales Pipelines & Lifecycle Milestone Metrics</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-cyan mt-1 text-xs"></i> Multi-branch Customer Support Ticketing Dispatch Core</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-cyan mt-1 text-xs"></i> AI Automated Swahili Contextual Chatbot Implementations</li>
                    </ul>
                </div>

                <div class="bg-white/5 p-8 rounded-xl">
                    <h3 class="text-xl text-opes-cyan mb-6 uppercase tracking-wider"><i class="fa-solid fa-sitemap mr-3"></i>Integrated Resource Infrastructure Modules</h3>
                    <ul class="space-y-4 text-opes-text-gray text-base">
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-orange mt-1 text-xs"></i> Localized Multi-currency Ledger Financial & Regulatory Accounting</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-orange mt-1 text-xs"></i> Native HR Core: TRA, PAYE, NSSF, and WCF Payroll Computation Modules</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-orange mt-1 text-xs"></i> Procurement & Multi-warehouse Inventory Movement Management</li>
                        <li class="flex items-start gap-2"><i class="fa-solid fa-check text-opes-orange mt-1 text-xs"></i> High-value Capital Asset Depreciation and Preventive Lifecycle Tracking</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white/5 p-10 rounded-xl text-center">
                <h3 class="text-2xl font-bold mb-8 uppercase tracking-wide">Industry-Specific Pre-Configurations Available</h3>
                <div class="flex flex-wrap gap-4 justify-center">
                    @if(isset($service) && $service->industries->count() > 0)
                        @foreach($service->industries as $ind)
                            <span class="industry-pill"><i class="{{ $ind->icon_class ?? 'fa-solid fa-network-wired' }} mr-2 text-opes-cyan"></i> {{ $ind->name }}</span>
                        @endforeach
                    @else
                        <span class="industry-pill"><i class="fa-solid fa-hospital-user mr-2 text-opes-cyan"></i> Healthcare & Hospital Infrastructure</span>
                        <span class="industry-pill"><i class="fa-solid fa-scale-balanced mr-2 text-opes-cyan"></i> Legal Practice Management</span>
                        <span class="industry-pill"><i class="fa-solid fa-school mr-2 text-opes-cyan"></i> Institutional Education Platforms</span>
                        <span class="industry-pill"><i class="fa-solid fa-helmet-safety mr-2 text-opes-cyan"></i> Mining & Resource Operations</span>
                        <span class="industry-pill"><i class="fa-solid fa-building-columns mr-2 text-opes-cyan"></i> SACCOs & Cooperative Ledger Registry</span>
                    @endif
                </div>
                <p class="mt-8 text-sm text-opes-text-gray max-w-3xl mx-auto leading-relaxed">
                    Configurations include dedicated specialized logic modules processing: patient ledger billings, matter tracking, dividend processing registries, manufacturing bill-of-materials (BOM), and procurement workflows.
                </p>
            </div>
        </div>
    </section>
@endsection
