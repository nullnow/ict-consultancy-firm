@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-8">

    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-dash-accent-blue-light hover:underline"><i class="fa-solid fa-arrow-left mr-2"></i>Return to Dashboard</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

        <div class="lg:col-span-6 bg-dash-surface p-8 rounded-xl space-y-6">
            <h3 class="text-xl text-white">Modify Service Information</h3>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Display Title Architecture</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Sub-header Technical Tagline</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $service->subtitle) }}" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Vector Performance Result Label</label>
                        <input type="text" name="results_summary" value="{{ old('results_summary', $service->results_summary) }}" placeholder="e.g. 30% fuel savings" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">FontAwesome Style Class Definition</label>
                        <input type="text" name="icon_class" value="{{ old('icon_class', $service->icon_class) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Marketplace Structural Positioning Paragraph (Intro Text)</label>
                    <textarea name="intro_text" rows="6" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">{{ old('intro_text', $service->intro_text) }}</textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white text-sm font-bold uppercase tracking-wider rounded transition-colors">
                    Save Service Information
                </button>
            </form>
        </div>

        <div class="lg:col-span-6 space-y-6">

            <div class="bg-dash-surface p-8 rounded-xl">
                <h3 class="text-xl text-white mb-6">Insert Dynamic Feature Details</h3>
                <form action="{{ route('admin.features.store', $service->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-2">
                            <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Feature Title</label>
                            <input type="text" name="title" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                        </div>
                        <div>
                            <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Rendering Order</label>
                            <input type="number" name="sort_order" value="0" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Description</label>
                        <textarea name="description" rows="2" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light"></textarea>
                    </div>
                    <button type="submit" class="w-full py-2 bg-zinc-800 hover:bg-zinc-700 text-white text-xs font-bold uppercase tracking-wider rounded transition-colors">
                        Add Feature Details
                    </button>
                </form>
            </div>

            <div class="space-y-4">
                <h4 class="text-xs uppercase tracking-widest text-dash-muted font-bold">Existing Features</h4>

                @forelse($service->features as $feat)
                    <div class="bg-dash-surface/50 p-4 rounded-lg flex justify-between items-start gap-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="px-2 py-0.5 bg-black/40 text-[10px] font-mono text-cyan-400 font-bold rounded">Pos: {{ $feat->sort_order }}</span>
                                <h5 class="text-sm font-bold text-white uppercase">{{ $feat->title }}</h5>
                            </div>
                            <p class="text-xs text-dash-muted leading-relaxed">{{ $feat->description }}</p>
                        </div>
                        <form action="{{ route('admin.features.destroy', $feat->id) }}" method="POST" onsubmit="return confirm('Confirm removal of this active feature element?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 p-2 text-xs">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-xs text-dash-muted italic">No sub-features registered for this active system view profile.</p>
                @endforelse
            </div>

        </div>

    </div>
</div>
@endsection
