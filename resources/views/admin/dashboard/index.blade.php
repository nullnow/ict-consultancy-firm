@extends('layouts.dashboard')

@section('main_content')
<div class="space-y-12">

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
                        <p class="text-xs text-dash-muted uppercase tracking-wider font-semibold">{{ $srv->features_count }} Active Feature Configurations</p>
                    </div>
                    <a href="{{ route('admin.services.edit', $srv->id) }}" class="w-full text-center text-xs font-bold uppercase tracking-wider py-2 bg-dash-bg border border-dash-accent-blue/30 text-dash-accent-blue-light rounded-sm hover:bg-dash-accent-blue hover:text-white transition-colors">
                        Modify Service Information
                    </a>
                </div>
            @endforeach
        </div>
    </div>

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
                                <form action="{{ route('admin.inquiries.status', $inq->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PUT')
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
