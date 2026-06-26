@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-12">

    <div>
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-2xl text-white font-bold tracking-tight">Individual Service Information & Features</h2>
                <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Modify core marketing assets dynamically or deploy new matrix instances.</p>
            </div>
            <div>
                <a href="{{ route('admin.services.create') }}" class="inline-flex items-center gap-2 px-4 py-3 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white font-heading font-bold text-xs uppercase tracking-wider rounded transition-colors shadow-md">
                    <i class="fa-solid fa-plus text-[10px]"></i> Create New Service
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($services as $srv)
                <div class="bg-dash-surface p-6 rounded-xl flex flex-col justify-between items-start gap-5 border border-white/5 transition-all hover:border-white/10 hover:bg-dash-surface/80">
                    <div class="w-full space-y-4">
                        <!-- Top Status Badge row -->
                        <div class="flex items-start justify-between">
                            <div class="w-12 h-12 rounded bg-dash-accent-blue/20 flex items-center justify-center text-xl text-dash-accent-blue-light flex-shrink-0">
                                <i class="{{ $srv->icon_class ?? 'fa-solid fa-cube' }}"></i>
                            </div>
                            <div class="flex flex-col items-end gap-1.5 text-[10px] font-mono font-bold">
                                <span class="px-2 py-0.5 bg-black/40 text-cyan-400 rounded">
                                    {{ $srv->features_count ?? 0 }} Features
                                </span>
                                <span class="px-2 py-0.5 bg-black/40 text-purple-400 rounded">
                                    {{ is_array($srv->solutions) ? count($srv->solutions) : (json_decode($srv->solutions, true) ? count(json_decode($srv->solutions, true)) : 0) }} Solutions
                                </span>
                            </div>
                        </div>

                        <!-- Main Content Areas -->
                        <div class="space-y-2">
                            <div>
                                <h3 class="text-base text-white font-bold tracking-tight leading-tight">{{ $srv->title }}</h3>
                                <p class="text-[11px] text-dash-muted font-mono truncate mt-0.5" title="Routing Slug: {{ $srv->slug }}">/{{ $srv->slug }}</p>
                            </div>

                            @if($srv->headline)
                                <p class="text-xs font-semibold text-white/90 line-clamp-1 border-l-2 border-dash-accent-blue/40 pl-2 mt-2">
                                    {{ $srv->headline }}
                                </p>
                            @endif

                            @if($srv->strapline)
                                <p class="text-xs text-dash-muted italic line-clamp-2">
                                    "{{ $srv->strapline }}"
                                </p>
                            @endif

                            @if($srv->message)
                                <p class="text-xs text-dash-muted/70 line-clamp-2 pt-1">
                                    {{ $srv->message }}
                                </p>
                            @endif
                        </div>

                        <!-- Strategic Metadata Footnotes -->
                        <div class="space-y-2 pt-3 border-t border-white/5 text-[11px]">
                            @if($srv->results_summary)
                                <div>
                                    <span class="block text-[10px] uppercase font-bold text-cyan-400/80 tracking-wider">Metrics Summary</span>
                                    <p class="text-xs text-white font-medium truncate mt-0.5">{{ $srv->results_summary }}</p>
                                </div>
                            @endif

                            <!-- Active Content Flags -->
                            <div class="flex flex-wrap gap-1.5 pt-1">
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-mono uppercase tracking-wider {{ $srv->call_to_action ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-white/[0.02] text-white/30' }}">
                                    CTA {{ $srv->call_to_action ? '✓' : '∅' }}
                                </span>
                                <span class="px-1.5 py-0.5 rounded text-[9px] font-mono uppercase tracking-wider {{ $srv->closing_line ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-white/[0.02] text-white/30' }}">
                                    Closing {{ $srv->closing_line ? '✓' : '∅' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="w-full text-center text-xs font-bold uppercase tracking-wider py-2.5 bg-dash-bg border border-dash-accent-blue/30 text-dash-accent-blue-light rounded hover:bg-dash-accent-blue hover:text-white transition-colors mt-auto">
                        Modify Service Details
                    </a>
                </div>
            @empty
                <div class="col-span-full bg-dash-surface/40 p-8 rounded-xl border border-dashed border-white/10 text-center">
                    <p class="text-sm text-dash-muted italic">No active service saved yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    <div>
        <div class="mb-6">
            <h2 class="text-2xl text-white font-bold tracking-tight">Live Lead Generation Entries</h2>
            <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Real-time incoming client conversion vectors and contact tracking metrics.</p>
        </div>

        <div class="w-full overflow-x-auto bg-dash-surface rounded-xl border border-white/5 shadow-xl">
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
                        <tr class="hover:bg-white/[0.01] transition-colors">
                            <td class="p-4 whitespace-nowrap text-xs font-mono text-dash-muted">
                                {{ $inq->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="p-4 whitespace-nowrap">
                                <p class="text-white font-bold">{{ $inq->full_name }}</p>
                                <p class="text-xs text-dash-muted">{{ $inq->email }} <span class="text-white/10 mx-1">//</span> {{ $inq->phone_number }}</p>
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
                                <form action="{{ route('admin.inquiries.update_status', $inq->id) }}" method="POST" class="flex items-center justify-center">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs font-bold uppercase tracking-wider bg-dash-bg p-2 rounded border border-white/10 text-white focus:outline-none focus:border-dash-accent-blue-light cursor-pointer">
                                        <option value="pending" {{ $inq->status == 'pending' ? 'selected' : '' }} class="bg-dash-surface text-amber-500">Pending Execution</option>
                                        <option value="contacted" {{ $inq->status == 'contacted' ? 'selected' : '' }} class="bg-dash-surface text-blue-400">Contact Engaged</option>
                                        <option value="closed" {{ $inq->status == 'closed' ? 'selected' : '' }} class="bg-dash-surface text-emerald-400">Pipeline Closed</option>
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
                            <td colspan="7" class="p-12 text-center text-sm text-dash-muted italic">
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
