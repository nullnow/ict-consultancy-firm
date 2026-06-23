<?php

namespace App\Http\Controllers;

use App\Models\DemoInquiry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    /**
     * Store a newly created demo enquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'full_name'             => 'required|string|max:255',
            'company_name'          => 'required|string|max:255',
            'phone_number'          => 'required|string|max:30',
            'email'                 => 'required|email|max:255',
            'fleet_size'            => 'nullable|string|in:1-50,51-200,201+,Not Applicable',
            'service_interested_in' => 'required|string|max:100',
            'message'               => 'nullable|string|max:2000',
        ]);

        $inquiry = DemoInquiry::create($validated);

        // Optional: Trigger background tasks/notifications here
        // event(new NewInquiryReceived($inquiry));
        // Mail::to('sales@opestechnologies.co.tz')->send(new AdminNotification($inquiry));

        return redirect()->back()->with('success', 'Your request has been successfully recorded. An OPES systems expert will contact you within 24 hours.');
    }
}
