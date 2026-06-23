<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Feature;
use App\Models\DemoInquiry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Provide a broad overview displaying core content states and lead management tracking.
     */
    public function index(): View
    {
        $services = Service::withCount('features')->get();
        $inquiries = DemoInquiry::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.dashboard.index', compact('services', 'inquiries'));
    }

    /**
     * Show the form for deploying a brand-new service architecture node.
     */
    public function createService(): View
    {
        return view('admin.dashboard.services_create');
    }

    /**
     * Store and compile a newly initialized service node into the ecosystem.
     */
    public function storeService(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:services,slug|alpha_dash',
            'subtitle'        => 'nullable|string|max:255',
            'intro_text'      => 'required|string',
            'results_summary' => 'nullable|string|max:255',
            'icon_class'      => 'required|string|max:100',
        ]);

        $service = Service::create($validated);

        return redirect()->route('admin.dashboard')->with('success', "New system engine node [{$service->title}] deployed successfully into active matrices.");
    }

    /**
     * Display editing parameters for a single primary Service component.
     */
    public function editService(Service $service): View
    {
        $service->load('features');
        return view('admin.dashboard.services_edit', compact('service'));
    }

    /**
     * Process content updates for core Service metrics.
     */
    public function updateService(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'subtitle'        => 'nullable|string|max:255',
            'intro_text'      => 'required|string',
            'results_summary' => 'nullable|string|max:255',
            'icon_class'      => 'required|string|max:100',
        ]);

        $service->update($validated);

        return redirect()->route('admin.dashboard')->with('success', "Service engine settings [{$service->title}] recompiled successfully.");
    }

    /**
     * Dynamically insert tactical configuration items tied to an explicit service dimension.
     */
    public function storeFeature(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'icon_class'  => 'nullable|string|max:100',
            'sort_order'  => 'required|integer',
        ]);

        $service->features()->create($validated);

        return redirect()->back()->with('success', 'Structural differentiator metric registered into active dataset.');
    }

    /**
     * Remove explicit components from view output arrays.
     */
    public function destroyFeature(Feature $feature): RedirectResponse
    {
        $feature->delete();
        return redirect()->back()->with('success', 'Content entity purged from execution indices.');
    }

    /**
     * Update pipeline tracking metrics for conversion management.
     */
    public function updateInquiryStatus(Request $request, DemoInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,contacted,closed'
        ]);

        $inquiry->update($validated);

        return redirect()->back()->with('success', "Inquiry vector baseline status assigned to: {$validated['status']}.");
    }

    /**
     * Isolate and inspect a specific client conversion lead entry.
     */
    public function showInquiry(DemoInquiry $inquiry): View
    {
        return view('admin.dashboard.inquiries_show', compact('inquiry'));
    }
}
