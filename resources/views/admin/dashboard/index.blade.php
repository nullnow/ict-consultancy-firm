@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-12">

    <!-- Section 1: Individual Service Engines -->
    <div>
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl text-white">Individual Service Information & Features</h2>
                <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Modify core marketing assets dynamically or add new items.</p>
            </div>
            <div>
                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-4 py-3 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white font-heading font-bold text-xs uppercase tracking-wider rounded-sm transition-colors">
                    <i class="fa-solid fa-plus text-[10px]"></i> Create Service
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($services as $srv)
                <div class="bg-dash-surface p-6 rounded-xl flex flex-col justify-between items-start gap-4 transition-all hover:bg-dash-surface/80">
                    <div class="w-12 h-12 rounded bg-dash-accent-blue/20 flex items-center justify-center text-xl text-dash-accent-blue-light">
                        <i class="{{ $srv->icon_class }}"></i>
                    </div>
                    <div>
                        <h3 class="text-base text-white font-bold tracking-tight mb-1">{{ $srv->title }}</h3>
                        <p class="text-xs text-dash-muted uppercase tracking-wider font-semibold">{{ $srv->features_count }} Active Feature(s)</p>
                    </div>
                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="w-full text-center text-xs font-bold uppercase tracking-wider py-2 bg-dash-bg border border-dash-accent-blue/30 text-dash-accent-blue-light rounded-sm hover:bg-dash-accent-blue hover:text-white transition-colors">
                        Modify Service Information
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section 2: Strategic Use Case Profiles -->
    <div>
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl text-white">Strategic Case Studies & Deployments</h2>
                <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Manage public deployment proofs and validated ecosystem benchmarks.</p>
            </div>
            <div>
                <a href="{{ route('admin.use_cases.create') }}" class="inline-flex items-center gap-2 px-4 py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-heading font-bold text-xs uppercase tracking-wider rounded-sm transition-colors">
                    <i class="fa-solid fa-plus text-[10px]"></i> Create Use Case
                </a>
            </div>
        </div>

        <div class="w-full overflow-x-auto bg-dash-surface rounded-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-black/20 border-b border-white/5 text-xs text-dash-muted uppercase font-bold tracking-wider">
                        <th class="p-4">Title & Scope</th>
                        <th class="p-4">Linked Engine</th>
                        <th class="p-4">Client / Industry</th>
                        <th class="p-4">Quantifiable Metrics</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @forelse($useCases as $uc)
                        <tr class="hover:bg-white/[0.01]">
                            <td class="p-4">
                                <p class="text-white font-bold">{{ $uc->title }}</p>
                                <p class="text-xs font-mono text-dash-muted">{{ $uc->slug }}</p>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <span class="px-2 py-1 bg-dash-bg border border-white/10 rounded text-xs font-medium text-dash-accent-blue-light">
                                    {{ $uc->service->title ?? 'Unlinked' }}
                                </span>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <p class="text-white text-xs font-medium">{{ $uc->client_name }}</p>
                                <p class="text-[11px] text-dash-muted uppercase tracking-wider">{{ $uc->industry }}</p>
                            </td>
                            <td class="p-4 max-w-xs text-xs text-emerald-400 font-mono italic">
                                {{ $uc->metrics_won ?? 'No explicit performance vectors specified.' }}
                            </td>
                            <td class="p-4 whitespace-nowrap text-center">
                                @if($uc->is_published)
                                    <span class="text-[10px] bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full uppercase tracking-wider font-bold">Active Live</span>
                                @else
                                    <span class="text-[10px] bg-amber-500/10 border border-amber-500/20 text-amber-400 px-2 py-0.5 rounded-full uppercase tracking-wider font-bold">Draft Block</span>
                                @endif
                            </td>
                            <td class="p-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.use_cases.edit', $uc->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded bg-dash-bg border border-white/10 text-dash-accent-blue-light hover:bg-dash-accent-blue hover:text-white transition-all" title="Edit Log">
                                        <i class="fa-solid fa-pen text-xs"></i>
                                    </a>
                                    <form action="{{ route('admin.use_cases.destroy', $uc->id) }}" method="POST" onsubmit="return confirm('Confirm total extraction of this profile entity?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded bg-dash-bg border border-red-500/20 text-red-400 hover:bg-red-500 hover:text-white transition-all" title="Purge Record">
                                            <i class="fa-solid fa-trash-can text-xs"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-12 text-center text-sm text-dash-muted">
                                No secondary profile benchmarks calculated inside active execution arrays.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Section 3: Live Lead Generation Entries -->
    <div>
        <div class="mb-6">
            <h2 class="text-2xl text-white">Live Lead Generation Entries</h2>
            <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Real-time incoming lead generation entries and contact information.</p>
        </div>

        <div class="w-full overflow-x-auto bg-dash-surface rounded-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-black/20 border-b border-white/5 text-xs text-dash-muted uppercase font-bold tracking-wider">
                        <th class="p-4">Timestamp</th>
                        <th class="p-4">Contact Strategy</th>
                        <th class="p-4">Organizational Unit</th>
                        <th class="p-4">Infrastructure Target</th>
                        <th class="p-4">Message Segment</th>
                        <th class="p-4 text-center">Pipeline Routing Status</th>
                        <th class="p-4 text-center">View</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @forelse($inquiries as $inq)
                        <tr class="hover:bg-white/[0.01]">
                            <td class="p-4 whitespace-nowrap text-xs font-mono text-dash-muted">
                                {{ $inq->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <p class="text-white font-bold">{{ $inq->full_name }}</p>
                                <p class="text-xs text-dash-muted">{{ $inq->email }} // {{ $inq->phone_number }}</p>
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <p class="text-white font-medium">{{ $inq->company_name }}</p>
                                <p class="text-xs text-cyan-400 font-mono">Fleet Size: {{ $inq->fleet_size ?? 'N/A' }}</p>
                            </td>
                            <td class="p-4 whitespace-nowrap text-xs font-bold uppercase tracking-wide text-dash-accent-blue-light">
                                {{ $inq->service_interested_in }}
                            </td>
                            <td class="p-4 max-w-md text-xs text-dash-muted truncate" title="{{ $inq->message }}">
                                {{ $inq->message ?? 'No parameters provided.' }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <form action="{{ route('admin.inquiries.update_status', $inq->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs font-bold uppercase tracking-wider bg-dash-bg p-2 rounded border border-white/10 text-white focus:outline-none">
                                        <option value="pending" {{ $inq->status == 'pending' ? 'selected' : '' }} class="text-amber-500">Pending Execution</option>
                                        <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }} class="text-blue-400">Contact Engaged</option>
                                        <option value="closed" {{ $inq->status == 'closed' ? 'selected' : '' }} class="text-emerald-400">Pipeline Closed</option>
                                    </select>
                                </form>
                            </td>
                            <td class="p-4 whitespace-nowrap text-center">
                                <a href="{{ route('admin.inquiries.show', $inq->id) }}" title="Inspect Payload" class="inline-flex items-center justify-center w-8 h-8 rounded bg-dash-bg border border-white/10 text-dash-accent-blue-light hover:bg-dash-accent-blue hover:text-white transition-all">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-sm text-dash-muted">
                                No active customer conversion vectors captured in current logging arrays.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $inquiries->links() }}
        </div>
    </div>

</div>
@endsection
