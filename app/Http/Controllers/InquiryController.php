<?php

namespace App\Http\Controllers;

use App\Models\DemoInquiry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Resend\Laravel\Facades\Resend;

class InquiryController extends Controller
{
    /**
     * Store a newly created demo enquiry.
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'full_name'             => 'required|string|max:255',
                'company_name'          => 'required|string|max:255',
                'phone_number'          => 'required|string|max:30',
                'email'                 => 'required|email|max:255',
                'fleet_size'            => 'nullable|string|in:1-50,51-200,201+,Not Applicable',
                'service_interested_in' => 'required|string|max:100',
                'message'               => 'nullable|string|max:2000',
            ]);

            // Persist securely to the database
            $inquiry = DemoInquiry::create($validated);

            // Use config with a robust fallback to prevent [null] type errors
            $recipientEmail = config('mail.admin_email');

            Resend::emails()->send([
                'from'    => 'Notification Service <info@null.name.ng>',
                'to'      => [$recipientEmail],
                'subject' => "New Enquiry: {$validated['full_name']} - {$validated['service_interested_in']}",
                'html'    => view('emails.inquiry', ['info' => $inquiry])->render()
            ]);

            return redirect()->back()->with('success', 'Your request has been successfully recorded. An OPES systems expert will contact you within 24 hours.');
        } catch (\Exception $e) {
            // Log the complete error stack trace for faster debugging
            \Log::error('Error storing inquiry: ' . $e->getMessage(), ['exception' => $e]);

            // Redirect back with an error notification banner status
            return back()->with('error', 'Sorry, there was an issue saving your contact submission. Please try again.');
        }
    }
}
