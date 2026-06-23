@extends('layouts.app')

@section('title', 'Connected Enterprise Services | OPES Technologies')

@section('content')
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-black mb-6">Connected Solutions</h1>
            <p class="text-xl md:text-2xl text-opes-text-main/80 font-light max-w-4xl mx-auto mb-16">
                One partner. Four systems. Every part of your business, connected seamlessly.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-left">
                @foreach($services as $srv)
                    <div class="glass-card flex flex-col justify-between h-full">
                        <div>
                            <div class="text-4xl text-opes-cyan mb-6"><i class="{{ $srv->icon_class }}"></i></div>
                            <h3 class="text-xl font-bold mb-4 tracking-wide text-opes-text-main uppercase">{{ $srv->title }}</h3>
                            <p class="text-opes-text-gray text-sm italic mb-4">{{ $srv->subtitle }}</p>
                            <p class="text-opes-text-main/90 mb-6 font-light leading-relaxed">{{ Str::limit($srv->intro_text, 180) }}</p>
                        </div>
                        @if($srv->results_summary)
                            <div class="p-4 bg-opes-cyan/5 border-l-2 border-opes-cyan rounded-r-md mb-6 text-sm text-opes-cyan font-medium">
                                {{ $srv->results_summary }}
                            </div>
                        @endif
                        <div class="pt-4">
                            <a href="{{ route('services.show', $srv->slug) }}" class="btn btn-secondary w-full sm:w-auto text-xs">Deep Dive System Analysis</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
