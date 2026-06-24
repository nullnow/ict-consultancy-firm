@extends('layouts.dashboard')

@section('main_content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase text-dash-accent-blue-light tracking-wide hover:underline">← Return to Matrix Overview</a>
        <h2 class="text-2xl text-white mt-2 font-bold">Deploy New Strategic Profile Case</h2>
        <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Compile functional deployment metrics into client presentation layouts.</p>
    </div>

    <form action="{{ route('admin.use_cases.store') }}" method="POST" class="bg-dash-surface p-8 rounded-xl border border-white/5 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Linked Service Engine Node *</label>
                <select name="service_id" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                    <option value="" disabled selected>Select system link...</option>
                    @foreach($services as $srv)
                        <option value="{{ $srv->id }}" {{ old('service_id') == $srv->id ? 'selected' : '' }}>{{ $srv->title }}</option>
                    @endforeach
                </select>
                @error('service_id') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Profile Status</label>
                <div class="flex items-center h-12">
                    <label class="inline-flex items-center cursor-pointer gap-3">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded bg-dash-bg border-white/10 text-dash-accent-blue focus:ring-0">
                        <span class="text-sm font-medium text-white">Broadcast directly to active client index templates</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Profile Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g., Integrated Cross-Border Fleet Scaling" class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Slug Routing Vector *</label>
                <input type="text" name="slug" value="{{ old('slug') }}" required placeholder="e.g., integrated-cross-border-fleet-scaling" class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white font-mono focus:outline-none focus:border-dash-accent-blue">
                @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Client / Partner Name *</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" required placeholder="e.g., Apex Logistics Ltd" class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('client_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Target Industry / Domain Space *</label>
                <input type="text" name="industry" value="{{ old('industry') }}" required placeholder="e.g., Haulage & Supply Chain" class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('industry') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Operation Benchmark / Quantifiable Metrics</label>
            <input type="text" name="metrics_won" value="{{ old('metrics_won') }}" placeholder="e.g., Cut total fuel wastage by 28% and recovered 4.2% operational revenue margin." class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white font-medium placeholder-emerald-500/40 text-emerald-400 focus:outline-none focus:border-dash-accent-blue">
            @error('metrics_won') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">The Operational Challenge *</label>
            <textarea name="challenge" rows="4" required placeholder="Outline initial architectural flaws, systemic vulnerabilities, or resource performance gaps." class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue leading-relaxed">{{ old('challenge') }}</textarea>
            @error('challenge') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">The OPES Ecosystem Integration Solution *</label>
            <textarea name="solution" rows="4" required placeholder="Detail specific modules deployed, custom engineering optimizations executed, and synchronization mechanics applied." class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue leading-relaxed">{{ old('solution') }}</textarea>
            @error('solution') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-white/5 flex items-center justify-end">
            <button type="submit" class="px-6 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider rounded transition-colors">
                Compile Profiling Entity
            </button>
        </div>
    </form>
</div>
@endsection
