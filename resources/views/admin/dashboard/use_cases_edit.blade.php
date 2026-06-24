@extends('layouts.dashboard')

@section('main_content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase text-dash-accent-blue-light tracking-wide hover:underline">← Cancel & Return to Overview</a>
        <h2 class="text-2xl text-white mt-2 font-bold">Modify Strategic Blueprint Profile</h2>
        <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Recompile system variables or optimize quantitative success assertions.</p>
    </div>

    <form action="{{ route('admin.use_cases.update', $useCase->id) }}" method="POST" class="bg-dash-surface p-8 rounded-xl border border-white/5 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Linked Service Engine Node *</label>
                <select name="service_id" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                    @foreach($services as $srv)
                        <option value="{{ $srv->id }}" {{ old('service_id', $useCase->service_id) == $srv->id ? 'selected' : '' }}>{{ $srv->title }}</option>
                    @endforeach
                </select>
                @error('service_id') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Profile Status</label>
                <div class="flex items-center h-12">
                    <label class="inline-flex items-center cursor-pointer gap-3">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $useCase->is_published) ? 'checked' : '' }} class="rounded bg-dash-bg border-white/10 text-dash-accent-blue focus:ring-0">
                        <span class="text-sm font-medium text-white">Broadcast directly to active client index templates</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Profile Title *</label>
                <input type="text" name="title" value="{{ old('title', $useCase->title) }}" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Slug Routing Vector *</label>
                <input type="text" name="slug" value="{{ old('slug', $useCase->slug) }}" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white font-mono focus:outline-none focus:border-dash-accent-blue">
                @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Client / Partner Name *</label>
                <input type="text" name="client_name" value="{{ old('client_name', $useCase->client_name) }}" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('client_name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Target Industry / Domain Space *</label>
                <input type="text" name="industry" value="{{ old('industry', $useCase->industry) }}" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue">
                @error('industry') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">Operation Benchmark / Quantifiable Metrics</label>
            <input type="text" name="metrics_won" value="{{ old('metrics_won', $useCase->metrics_won) }}" class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-emerald-400 font-medium focus:outline-none focus:border-dash-accent-blue">
            @error('metrics_won') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">The Operational Challenge *</label>
            <textarea name="challenge" rows="4" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue leading-relaxed">{{ old('challenge', $useCase->challenge) }}</textarea>
            @error('challenge') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-dash-muted uppercase tracking-wider mb-2">The OPES Ecosystem Integration Solution *</label>
            <textarea name="solution" rows="4" required class="w-full bg-dash-bg text-sm rounded border border-white/10 p-3 text-white focus:outline-none focus:border-dash-accent-blue leading-relaxed">{{ old('solution', $useCase->solution) }}</textarea>
            @error('solution') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="pt-4 border-t border-white/5 flex items-center justify-end">
            <button type="submit" class="px-6 py-3 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white font-bold text-xs uppercase tracking-wider rounded transition-colors">
                Recompile Deployment Parameters
            </button>
        </div>
    </form>
</div>
@endsection
