<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Feature;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display the Homepage.
     */
    public function index(): View
    {
        // Fetch "Why OPES" global features (where service_id is null)
        $differentiators = Feature::whereNull('service_id')
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        return view('public.index', compact('differentiators'));
    }

    /**
     * Display the Services Architecture Directory.
     */
    public function services(): View
    {
        $services = Service::all();
        return view('public.services', compact('services'));
    }

    /**
     * Dynamic Route Resolver for Service Deep-Dives.
     * Maps to slugs like: /services/telematics, /services/crm-erp, /services/bulk-sms
     */
    public function showService(string $slug): View
    {
        $service = Service::with(['features', 'industries'])->where('slug', $slug)->firstOrFail();

        // Dynamically pair specific styling presets if template variations are required
        $viewMap = [
            'telematics' => 'public.services.telematics',
            'crm-erp'    => 'public.services.crm_erp',
            'bulk-sms'   => 'public.services.bulk_sms',
        ];

        $view = $viewMap[$slug] ?? 'public.services.default_deep_dive';

        return view($view, compact('service'));
    }

    /**
     * Display the Corporate Overview Page.
     */
    public function about(): View
    {
        return view('public.about');
    }
}
