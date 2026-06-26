@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-8">

    <!-- Top Navigation & Flash Alerts -->
    <div class="space-y-4">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-dash-accent-blue-light hover:underline">
                <i class="fa-solid fa-arrow-left mr-2"></i>Return to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs rounded-lg font-medium">
                <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

        <!-- Left Column: Core Identity Management -->
        <div class="lg:col-span-6 bg-dash-surface p-8 rounded-xl space-y-6">
            <h3 class="text-xl text-white font-bold tracking-tight">Modify Service Information</h3>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Display Title Architecture</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Hook / Strapline Text</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $service->subtitle) }}" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">FontAwesome Style Class</label>
                    <input type="text" name="icon_class" value="{{ old('icon_class', $service->icon_class) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Marketplace Structural Positioning Paragraph (Intro Text)</label>
                    <textarea name="intro_text" rows="5" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">{{ old('intro_text', $service->intro_text) }}</textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white text-sm font-bold uppercase tracking-wider rounded transition-colors shadow-md">
                    Save Service Information
                </button>
            </form>
        </div>

        <!-- Right Column: Sub-relational Subsystems Matrix -->
        <div class="lg:col-span-6 space-y-12">

            <!-- Subsystem Block A: Dynamic System Capability Matrix (Features) -->
            <div class="space-y-6">
                <div class="bg-dash-surface p-8 rounded-xl">
                    <h3 class="text-xl text-white mb-6 font-bold tracking-tight">Add Feature Details</h3>
                    <form action="{{ route('admin.features.store', $service->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-3 gap-4">
                            <div class="col-span-2">
                                <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Feature Title</label>
                                <input type="text" name="title" required placeholder="e.g., Fuel Theft Detection" class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Sorting Rank</label>
                                <input type="number" name="sort_order" value="0" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Functional Feature Items</label>
                            <div id="feature-items-wrapper" class="space-y-2">
                                @if(old('items') && request()->submit_type === 'feature')
                                    @foreach(old('items') as $index => $oldItem)
                                        <div class="flex gap-2 items-center">
                                            <input type="text" name="items[]" value="{{ $oldItem }}" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                            <button type="button" onclick="this.parentElement.remove()" class="{{ $loop->first ? 'text-transparent pointer-events-none' : 'text-red-500 hover:text-red-400' }} p-2 text-xs transition-colors">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-2 items-center">
                                        <input type="text" name="items[]" required placeholder="e.g., Real-time siphon alerts via SMS" class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                        <button type="button" class="text-transparent p-2 text-xs cursor-default pointer-events-none">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-item-row" class="mt-2 text-[10px] text-cyan-400 hover:text-cyan-300 font-bold uppercase tracking-wider flex items-center gap-1 transition-colors">
                                <i class="fa-solid fa-plus"></i> Add Feature Item
                            </button>
                        </div>

                        <input type="hidden" name="submit_type" value="feature">
                        <button type="submit" class="w-full py-2 bg-zinc-800 hover:bg-zinc-700 text-white text-xs font-bold uppercase tracking-wider rounded transition-colors">
                            Add Feature Details
                        </button>
                    </form>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs uppercase tracking-widest text-dash-muted font-bold">Existing Core Features Matrix</h4>
                    @forelse($service->features->sortBy('sort_order') as $feat)
                        <div class="bg-dash-surface/50 p-4 rounded-lg flex justify-between items-start gap-4 border border-white/5">
                            <div class="space-y-2 pb-1">
                                <div class="flex items-center gap-2">
                                    <span class="px-2 py-0.5 bg-black/40 text-[10px] font-mono text-cyan-400 font-bold rounded">Pos: {{ $feat->sort_order }}</span>
                                    <h5 class="text-sm font-bold text-white uppercase">{{ $feat->title }}</h5>
                                </div>

                                <ul class="list-disc list-inside text-xs text-dash-muted space-y-1 pl-1 leading-relaxed">
                                    @foreach($feat->items ?? [] as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <form action="{{ route('admin.features.destroy', $feat->id) }}" method="POST" onsubmit="return confirm('Confirm removal of this active feature element?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 p-2 text-xs transition-colors">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-xs text-dash-muted italic pl-1">No service features registered for this architecture tier.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Combined Dynamic Row Management Scripts -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Feature Rows Creator
        document.getElementById('add-item-row').addEventListener('click', function () {
            const wrapper = document.getElementById('feature-items-wrapper');
            const newRow = document.createElement('div');
            newRow.className = 'flex gap-2 items-center';
            newRow.innerHTML = `
                <input type="text" name="items[]" required placeholder="Next subsystem item capability..." class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-400 p-2 text-xs transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            `;
            wrapper.appendChild(newRow);
        });
    });
</script>
@endsection
