<footer id="contact-section" class="bg-opes-darker mt-32 border-t border-white/5 pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-6">

        @if(session('success'))
            <div class="mb-12 p-6 bg-emerald-950/80 border border-emerald-500/30 text-emerald-300 rounded-lg max-w-4xl mx-auto">
                <p class="font-semibold text-center"><i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <div class="text-center max-w-5xl mx-auto mb-16">
            <h2 class="text-4xl md:text-5xl mb-6">Simplify Your Business. <span class="text-gradient font-black">Talk to Us.</span></h2>
            <p class="text-xl text-opes-text-main/80 font-light max-w-4xl mx-auto">
                Whatever challenge you're solving — a leaking fuel budget, a customer who can't get through, a spreadsheet doing an ERP's job — we'll show you exactly how to fix it on a single call.
            </p>
            <div class="inline-block mt-6 px-4 py-2 bg-opes-orange/10 border border-opes-orange/20 rounded-full text-opes-orange text-xs uppercase tracking-widest font-bold">
                Response Promise: Within 24 hours.
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start mt-12">

            <div class="lg:col-span-7 bg-opes-dark/40 p-10 rounded-xl backdrop-blur-md">
                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full p-4 bg-white/5 border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan focus:bg-opes-cyan/5">
                            @error('full_name') <p class="text-opes-orange text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Company Name</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" required class="w-full p-4 bg-white/5 border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan focus:bg-opes-cyan/5">
                            @error('company_name') <p class="text-opes-orange text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Phone Number</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required placeholder="e.g., +255..." class="w-full p-4 bg-white/5 border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan focus:bg-opes-cyan/5">
                            @error('phone_number') <p class="text-opes-orange text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-4 bg-white/5 border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan focus:bg-opes-cyan/5">
                            @error('email') <p class="text-opes-orange text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Fleet Size</label>
                            <select name="fleet_size" class="w-full p-4 bg-opes-dark border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan">
                                <option value="Not Applicable" {{ old('fleet_size') == 'Not Applicable' ? 'selected' : '' }}>Not Applicable</option>
                                <option value="1-50" {{ old('fleet_size') == '1-50' ? 'selected' : '' }}>1-50 Vehicles</option>
                                <option value="51-200" {{ old('fleet_size') == '51-200' ? 'selected' : '' }}>51-200 Vehicles</option>
                                <option value="201+" {{ old('fleet_size') == '201+' ? 'selected' : '' }}>201+ Vehicles</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Service Interested In</label>
                            <select name="service_interested_in" required class="w-full p-4 bg-opes-dark border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan">
                                <option value="Telematics" {{ old('service_interested_in') == 'Telematics' ? 'selected' : '' }}>Telematics & Fleet Intelligence</option>
                                <option value="Bulk SMS" {{ old('service_interested_in') == 'Bulk SMS' ? 'selected' : '' }}>Bulk SMS & Communication</option>
                                <option value="CRM" {{ old('service_interested_in') == 'CRM' ? 'selected' : '' }}>Custom CRM Solutions</option>
                                <option value="ERP" {{ old('service_interested_in') == 'ERP' ? 'selected' : '' }}>Custom ERP Platforms</option>
                                <option value="Other" {{ old('service_interested_in') == 'Other' ? 'selected' : '' }}>Other Business Infrastructure</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs uppercase tracking-wider text-opes-text-gray font-bold mb-2">Message / Operational Requirement</label>
                        <textarea name="message" rows="4" class="w-full p-4 bg-white/5 border border-white/10 rounded-sm text-opes-text-main text-sm focus:outline-none focus:border-opes-cyan focus:bg-opes-cyan/5">{{ old('message') }}</textarea>
                        @error('message') <p class="text-opes-orange text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full text-base font-bold">Simplify Your Business</button>
                </form>
            </div>

            <div class="lg:col-span-5 space-y-8">
                <div class="bg-white/5 p-8 rounded-xl flex items-start gap-6">
                    <div class="text-opes-cyan text-2xl mt-1"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <h4 class="text-xs text-opes-text-gray mb-1">Call Our Operations Center</h4>
                        <p class="text-xl font-bold text-opes-text-main tracking-wide">+255 693 099 999</p>
                        <p class="text-xl font-bold text-opes-text-main tracking-wide">+255 222 774 966</p>
                    </div>
                </div>

                <div class="bg-white/5 p-8 rounded-xl flex items-start gap-6">
                    <div class="text-opes-orange text-2xl mt-1"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <h4 class="text-xs text-opes-text-gray mb-1">Direct Electronic Inquiries</h4>
                        <p class="text-xl font-bold text-opes-text-main tracking-wide">info@opestechnologies.co.tz</p>
                    </div>
                </div>

                <div class="bg-white/5 p-8 rounded-xl flex items-start gap-6">
                    <div class="text-opes-cyan text-2xl mt-1"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4 class="text-xs text-opes-text-gray mb-1">Corporate HQ Location</h4>
                        <p class="text-base font-medium text-opes-text-main leading-relaxed">
                            246 Vikawe Street, Regent Estate<br>Dar es Salaam, Tanzania
                        </p>
                    </div>
                </div>

                <div class="pt-12 text-center lg:text-left border-t border-white/5 text-xs text-opes-text-gray/40">
                    <p class="font-heading font-bold uppercase tracking-widest text-opes-cyan mb-2">Tanzanian Built & Proven</p>
                    Ecosystem Engine v2.6.2026
                </div>
            </div>

        </div>

        <div class="border-t border-white/5 mt-16 pt-8 text-center text-sm text-opes-text-gray/60">
            &copy; {{ date('Y') }} OPES Technologies. Simplifying operations and accelerating digital growth for Tanzanian enterprises. All rights reserved.
        </div>
    </div>
</footer>
