@extends('layouts.dashboard')

@section('main_content')
<div class="max-w-4xl mx-auto space-y-8">

    <!-- Navigation Back Anchor -->
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-dash-accent-blue-light hover:underline">
            <i class="fa-solid fa-arrow-left mr-2"></i>Return to Dashboard
        </a>
    </div>

    <!-- Wide Format Open Form Container -->
    <div class="bg-dash-surface p-8 rounded-xl space-y-6">
        <div>
            <h2 class="text-2xl text-white">Add New Service</h2>
            <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Create new service item. All fields populate front-end content directly.</p>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Display Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Cloud Infrastructure Scaling" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">URL Routing Slug (Alpha-Dash Only)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g., cloud-infrastructure" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Sub-header Technical Tagline</label>
                <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g., Highly available network configurations customized for East African data distribution." class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                @error('subtitle') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Vector Performance Metric (Results Summary)</label>
                    <input type="text" name="results_summary" value="{{ old('results_summary') }}" placeholder="e.g., 99.99% Core Uptime SLA" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('results_summary') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">FontAwesome Icon Class Architecture</label>
                    <input type="text" name="icon_class" value="{{ old('icon_class', 'fa-solid fa-server') }}" placeholder="e.g., fa-solid fa-network-wired" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    @error('icon_class') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Marketplace Structural Positioning Paragraph (Intro Text)</label>
                <textarea name="intro_text" rows="6" placeholder="Describe the structural operational problem this platform system solves for the enterprise client..." required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">{{ old('intro_text') }}</textarea>
                @error('intro_text') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-dash-accent-blue to-dash-accent-blue-light hover:opacity-90 text-white text-sm font-bold uppercase tracking-wider rounded transition-all shadow-md">
                    Save Service Information
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
