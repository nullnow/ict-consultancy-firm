@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-8">

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

        <div class="lg:col-span-6 bg-dash-surface p-8 rounded-xl space-y-6">
            <h3 class="text-xl text-white font-bold tracking-tight">Modify Service Information</h3>

            <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Display Title</label>
                        <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Routing Slug (Alpha-Dash)</label>
                        <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                        @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">System Headline</label>
                        <input type="text" name="headline" value="{{ old('headline', $service->headline) }}" placeholder="e.g., Enterprise Nodes" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('headline') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Hook / Strapline Text</label>
                        <input type="text" name="strapline" value="{{ old('strapline', $service->strapline) }}" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('strapline') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">FontAwesome Icon Class</label>
                        <input type="text" name="icon_class" value="{{ old('icon_class', $service->icon_class) }}" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                        @error('icon_class') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Results Summary Metric</label>
                        <input type="text" name="results_summary" value="{{ old('results_summary', $service->results_summary) }}" placeholder="e.g., 40% reduction in latency" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('results_summary') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Marketplace Structural Positioning Paragraph (Message)</label>
                    <textarea name="message" rows="4" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">{{ old('message', $service->message) }}</textarea>
                    @error('message') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-3 pt-2">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold">Service Solutions Information</label>
                        <button type="button" id="add-solution-row" class="text-[10px] text-cyan-400 hover:text-cyan-300 font-bold uppercase tracking-wider flex items-center gap-1 transition-colors">
                            <i class="fa-solid fa-plus"></i> Add Solution Details
                        </button>
                    </div>

                    <div id="solutions-wrapper" class="space-y-3">
                        @php
                            $solutions = old('solutions', $service->solutions ?? []);
                        @endphp
                        @foreach($solutions as $index => $solution)
                            <div class="solution-item bg-dash-bg p-4 rounded border border-white/10 space-y-3 relative group">
                                <button type="button" class="remove-solution text-red-500 hover:text-red-400 absolute top-3 right-3 text-xs transition-colors">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 pt-2">
                                    <div class="md:col-span-1">
                                        <label class="block text-[10px] uppercase font-bold text-dash-muted mb-1">Title</label>
                                        <input type="text" name="solutions[{{ $index }}][title]" value="{{ $solution['title'] ?? '' }}" required class="w-full p-2.5 bg-dash-surface border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label class="block text-[10px] uppercase font-bold text-dash-muted mb-1">Operational Description</label>
                                        <input type="text" name="solutions[{{ $index }}][description]" value="{{ $solution['description'] ?? '' }}" required class="w-full p-2.5 bg-dash-surface border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('solutions') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Call To Action Target Text</label>
                        <input type="text" name="call_to_action" value="{{ old('call_to_action', $service->call_to_action) }}" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('call_to_action') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Core Service Closing Line</label>
                        <input type="text" name="closing_line" value="{{ old('closing_line', $service->closing_line) }}" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                        @error('closing_line') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white text-sm font-bold uppercase tracking-wider rounded transition-colors shadow-md">
                    Update Service Information Details
                </button>
            </form>
        </div>

        <div class="lg:col-span-6 space-y-12">

            <div class="space-y-6">
                <div class="bg-dash-surface p-8 rounded-xl">
                    <h3 class="text-xl text-white mb-6 font-bold tracking-tight">Add Feature Information Details</h3>

                    <form action="{{ route('admin.features.store', $service->id) }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="md:col-span-1">
                                <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Feature Title</label>
                                <input type="text" name="title" value="{{ old('submit_type') === 'feature' ? old('title') : '' }}" required placeholder="e.g., Fleet Telematics" class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Icon Style Class</label>
                                <input type="text" name="icon_class" value="{{ old('submit_type') === 'feature' ? old('icon_class', 'fa-solid fa-cube') : 'fa-solid fa-cube' }}" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs font-mono focus:outline-none focus:border-dash-accent-blue-light">
                            </div>
                            <div>
                                <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Sorting Execution Rank</label>
                                <input type="number" name="sort_order" value="{{ old('submit_type') === 'feature' ? old('sort_order', '0') : '0' }}" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-xs uppercase text-dash-muted font-bold mb-1">Functional Feature Sequential List Items (Strict Sequence Array)</label>
                            <div id="feature-content-wrapper" class="space-y-2">
                                @if(old('content') && old('submit_type') === 'feature')
                                    @foreach(old('content') as $index => $oldContentItem)
                                        <div class="flex gap-2 items-center">
                                            <input type="text" name="content[]" value="{{ $oldContentItem }}" required class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                            <button type="button" onclick="this.parentElement.remove()" class="{{ $loop->first ? 'text-transparent pointer-events-none' : 'text-red-500 hover:text-red-400' }} p-2 text-xs transition-colors">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="flex gap-2 items-center">
                                        <input type="text" name="content[]" required placeholder="e.g., Real-time engine telemetry streaming configuration metrics" class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                                        <button type="button" class="text-transparent p-2 text-xs cursor-default pointer-events-none">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <button type="button" id="add-content-row" class="mt-2 text-[10px] text-cyan-400 hover:text-cyan-300 font-bold uppercase tracking-wider flex items-center gap-1 transition-colors">
                                <i class="fa-solid fa-plus"></i> Add Content Sequence Line Item
                            </button>
                        </div>

                        <input type="hidden" name="submit_type" value="feature">
                        <button type="submit" class="w-full py-3 bg-zinc-800 hover:bg-zinc-700 text-white text-xs font-bold uppercase tracking-wider rounded transition-colors tracking-widest">
                            Save New Feature Details
                        </button>
                    </form>
                </div>

                <div class="space-y-3">
                    <h4 class="text-xs uppercase tracking-widest text-dash-muted font-bold">Existing Core Features Details</h4>
                    @forelse($service->features->sortBy('sort_order') as $feat)
                        <div class="bg-dash-surface/50 p-4 rounded-lg flex justify-between items-start gap-4 border border-white/5">
                            <div class="space-y-2 pb-1">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="px-2 py-0.5 bg-black/40 text-[10px] font-mono text-cyan-400 font-bold rounded">Pos: {{ $feat->sort_order }}</span>
                                    <span class="text-dash-muted text-xs font-mono"><i class="{{ $feat->icon_class }}"></i></span>
                                    <h5 class="text-sm font-bold text-white uppercase tracking-wide">{{ $feat->title }}</h5>
                                </div>

                                <ul class="list-disc list-inside text-xs text-dash-muted space-y-1 pl-1 leading-relaxed">
                                    @foreach($feat->content ?? [] as $contentItem)
                                        <li>{{ $contentItem }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <form action="{{ route('admin.features.destroy', $feat->id) }}" method="POST" onsubmit="return confirm('Confirm complete removal of this active feature?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 p-2 text-xs transition-colors">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-xs text-dash-muted italic pl-1">No feature blocks bound to this service matrix instance.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Track unique index for structural solutions collection matrix to prevent key overwrite collisions
        let solutionIndex = {{ count($solutions) }};
        const solutionsWrapper = document.getElementById('solutions-wrapper');

        // Solutions Engine Matrix Array Injection Builder
        document.getElementById('add-solution-row').addEventListener('click', function () {
            const rowHtml = `
                <div class="solution-item bg-dash-bg p-4 rounded border border-white/10 space-y-3 relative group">
                    <button type="button" class="remove-solution text-red-500 hover:text-red-400 absolute top-3 right-3 text-xs transition-colors">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 pt-2">
                        <div class="md:col-span-1">
                            <label class="block text-[10px] uppercase font-bold text-dash-muted mb-1">Title</label>
                            <input type="text" name="solutions[${solutionIndex}][title]" required class="w-full p-2.5 bg-dash-surface border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[10px] uppercase font-bold text-dash-muted mb-1">Operational Description</label>
                            <input type="text" name="solutions[${solutionIndex}][description]" required class="w-full p-2.5 bg-dash-surface border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                        </div>
                    </div>
                </div>
            `;
            solutionsWrapper.insertAdjacentHTML('beforeend', rowHtml);
            solutionIndex++;
        });

        // Event listener capturing dynamic solution removal targets
        solutionsWrapper.addEventListener('click', function (e) {
            if (e.target.closest('.remove-solution')) {
                e.target.closest('.solution-item').remove();
            }
        });

        // Feature Content Sequential String Array Row Injector
        document.getElementById('add-content-row').addEventListener('click', function () {
            const wrapper = document.getElementById('feature-content-wrapper');
            const newRow = document.createElement('div');
            newRow.className = 'flex gap-2 items-center';
            newRow.innerHTML = `
                <input type="text" name="content[]" required placeholder="Next capability line entry structural item..." class="w-full p-3 bg-dash-bg border border-white/10 rounded text-white text-xs focus:outline-none focus:border-dash-accent-blue-light">
                <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-400 p-2 text-xs transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            `;
            wrapper.appendChild(newRow);
        });
    });
</script>
@endsection
