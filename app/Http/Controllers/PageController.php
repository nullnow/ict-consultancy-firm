<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Feature;
use Illuminate\View\View;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display the Homepage.
     */
    public function index(): View
    {
        // Clientele logos for Trusted By section
        $clientele = [
            "resources/images/opes-clientele/tanesco.png",
            "resources/images/opes-clientele/savanna.png",
            "resources/images/opes-clientele/radiomaria.png",
            "resources/images/opes-clientele/posta.png",
            "resources/images/opes-clientele/nissan.png",
            "resources/images/opes-clientele/lakegas.png",
            "resources/images/opes-clientele/equity.png",
            "resources/images/opes-clientele/crdb.png",
            "resources/images/opes-clientele/china-dasheng.png",
            "resources/images/opes-clientele/anglo-Gold.png"
        ];

        // Fetch "Why OPES" global features (where service_id is null)
        $differentiators = Feature::whereNull('service_id')
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        // YouTube player ID input
        $extractedId = null;

        $youtubeLink = "https://youtu.be/mdnF9R-Bzpg?si=4kwSQKJj0QA1PnBg";

        if ($youtubeLink) {
            // Regex to extract 11-digit YouTube ID from various URL shapes
            preg_match('/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/', $youtubeLink, $matches);
            $extractedId = (isset($matches[2]) && strlen($matches[2]) === 11) ? $matches[2] : null;
        }

        // Generate a unique ID per instance so multiple players can live on the same page
        $uniquePlayerId = 'yt_player_' . Str::random(9);

        return view('public.index', compact('differentiators'))->with("clientele", $clientele)->with("uniquePlayerId", $uniquePlayerId)->with("youtubeLink", $youtubeLink)->with("extractedId", $extractedId);
    }

    /**
     * Display the Services Architecture Directory.
     */
    public function services(): View
    {
        $services = Service::all();
        return view('public.services.overview', compact('services'));
    }

    /**
     * Dynamic Route Resolver for Service Deep-Dives.
     * Maps to slugs like: /services/telematics, /services/crm-erp, /services/bulk-sms
     */
    public function showService(string $slug): View
    {
        // Fetch the structural dataset or throw a 404 if the slug doesn't exist
        $service = Service::with(['features' => function ($query) {
            $query->orderBy('sort_order', 'asc');
        }])->where('slug', $slug)->firstOrFail();

        // Force every response directly through the single master template layout
        return view('public.services.page', compact('service'));
    }

    /**
     * Display the Corporate Overview Page.
     */
    public function about(): View
    {
        return view('public.about');
    }
}
