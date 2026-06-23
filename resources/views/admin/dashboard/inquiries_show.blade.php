@extends('layouts.dashboard')

@section('main_content')
<div class="max-w-5xl mx-auto space-y-8">

    <!-- Navigation Back Anchor -->
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-dash-accent-blue-light hover:underline">
            <i class="fa-solid fa-arrow-left mr-2"></i>Return to Dashboard
        </a>
    </div>

    <!-- Wide Split Framework Panel Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <!-- Left: Structural Data Payloads Segment -->
        <div class="lg:col-span-8 bg-dash-surface p-8 rounded-xl space-y-8">
            <div class="border-b border-white/5 pb-4 flex justify-between items-start">
                <div>
                    <h2 class="text-2xl text-white">{{ $inquiry->full_name }}</h2>
                    <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Inbound Payload Node Entry Blueprint</p>
                </div>
                <div class="text-right">
                    <span class="text-xs font-mono text-dash-muted bg-black/40 px-3 py-1.5 rounded">
                        Entry #{{ $inquiry->id }}
                    </span>
                </div>
            </div>

            <!-- Descriptive Metric Grid Fields -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-[10px] uppercase font-bold text-dash-muted tracking-wider mb-1">Corporate Electronic Mail Address</h4>
                    <p class="text-sm font-semibold text-white bg-black/20 p-3 rounded border border-white/5 select-all">
                        {{ $inquiry->email }}
                    </p>
                </div>
                <div>
                    <h4 class="text-[10px] uppercase font-bold text-dash-muted tracking-wider mb-1">Telemetry Comms Line (Phone)</h4>
                    <p class="text-sm font-semibold text-white bg-black/20 p-3 rounded border border-white/5 select-all">
                        {{ $inquiry->phone_number }}
                    </p>
                </div>
                <div>
                    <h4 class="text-[10px] uppercase font-bold text-dash-muted tracking-wider mb-1">Registered Enterprise / Organization</h4>
                    <p class="text-sm font-semibold text-white bg-black/20 p-3 rounded border border-white/5">
                        {{ $inquiry->company_name }}
                    </p>
                </div>
                <div>
                    <h4 class="text-[10px] uppercase font-bold text-dash-muted tracking-wider mb-1">Current Active Fleet Scaling Volume</h4>
                    <p class="text-sm font-semibold text-cyan-400 font-mono bg-black/20 p-3 rounded border border-white/5">
                        {{ $inquiry->fleet_size ?? 'Not Provided' }}
                    </p>
                </div>
            </div>

            <!-- Main Message Block Segment -->
            <div class="space-y-2">
                <h4 class="text-[10px] uppercase font-bold text-dash-muted tracking-wider">Inquiry Message Information</h4>
                <div class="p-4 bg-black/30 border border-white/5 rounded-lg text-sm text-slate-300 leading-relaxed whitespace-pre-line">
                    {{ $inquiry->message ?? 'Client submitted no structural telemetry parameter comments.' }}
                </div>
            </div>
        </div>

        <!-- Right: Meta Properties & Routing Controls Context Layer -->
        <div class="lg:col-span-4 space-y-6">

            <!-- Quick Pipeline Routing Switch Board Configuration -->
            <div class="bg-dash-surface p-6 rounded-xl space-y-4">
                <h3 class="text-xs uppercase font-bold text-white tracking-widest">Pipeline Operational Control</h3>
                <hr class="border-white/5">

                <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-[10px] uppercase font-bold text-dash-muted mb-2">Assign Integration Status Baseline</label>
                        <select name="status" class="w-full text-xs font-bold uppercase tracking-wider bg-dash-bg p-3 rounded-lg border border-white/10 text-white focus:outline-none focus:border-dash-accent-blue-light">
                            <option value="pending" {{ $inquiry->status == 'pending' ? 'selected' : '' }}>Pending Processing</option>
                            <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Active Engagement</option>
                            <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Pipeline Resolved / Closed</option>
                        </select>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-dash-accent-blue hover:bg-dash-accent-blue-light text-white font-heading font-bold text-xs uppercase tracking-wider rounded-sm transition-colors">
                        Update Tracking Status
                    </button>
                </form>
            </div>

            <!-- Technical Properties Information Card -->
            <div class="bg-dash-surface p-6 rounded-xl text-xs space-y-3">
                <h3 class="font-bold text-white uppercase tracking-wider">Telemetry Signature</h3>
                <hr class="border-white/5">
                <div class="flex justify-between py-1 border-b border-white/[0.02]">
                    <span class="text-dash-muted">Desired Service:</span>
                    <span class="text-dash-accent-blue-light font-bold">{{ $inquiry->service_interested_in }}</span>
                </div>
                <div class="flex justify-between py-1 border-b border-white/[0.02]">
                    <span class="text-dash-muted">Submitted On:</span>
                    <span class="text-slate-300 font-mono">{{ $inquiry->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <div class="flex justify-between py-1">
                    <span class="text-dash-muted">Created:</span>
                    <span class="text-slate-300 font-mono">{{ $inquiry->created_at->diffForHumans() }}</span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
