<footer id="contact-section" class="bg-opes-darker mt-16 md:mt-32 border-t border-white/5 pt-12 md:pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        @if(session('success'))
            <div class="mb-8 md:mb-12 p-4 md:p-6 bg-emerald-950/80 border border-emerald-500/30 text-emerald-300 rounded-lg max-w-4xl mx-auto">
                <p class="font-semibold text-center text-sm md:text-base"><i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}</p>
            </div>
        @endif

        <div class="text-center max-w-5xl mx-auto mb-10 md:mb-16">
            <h2 class="text-3xl sm:text-4xl md:text-5xl mb-4 md:mb-6 leading-tight">Simplify Your Business. <span class="text-gradient font-black">Talk to Us.</span></h2>
            <p class="text-base sm:text-lg md:text-xl text-opes-text-main/80 font-light max-w-4xl mx-auto px-2">
                Whatever challenge you're solving — a leaking fuel budget, a customer who can't get through, a spreadsheet doing an ERP's job — we'll show you exactly how to fix it on a single call.
            </p>
            <div class="inline-block mt-6 px-4 py-2 bg-opes-orange/10 border border-opes-orange/20 rounded-full text-opes-orange text-xs uppercase tracking-widest font-bold">
                Response Promise: Within 24 hours.
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-16 items-start mt-8 md:mt-12">

            <!-- Form Container: Padding scales down on mobile -->
            <div class="lg:col-span-7 bg-opes-dark/40 p-5 sm:p-6 md:p-10 rounded-xl backdrop-blur-md">
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

            <!-- Sidebar Info Cards: Responsive text wrap handles long emails cleanly -->
            <div class="lg:col-span-5 space-y-6 md:space-y-8">
                <div class="bg-white/5 p-6 md:p-8 rounded-xl flex items-start gap-4 md:gap-6">
                    <div class="text-opes-cyan text-xl md:text-2xl mt-1"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <h4 class="text-xs text-opes-text-gray mb-1">Call Our Operations Center</h4>
                        <p class="text-lg md:text-xl font-bold text-opes-text-main tracking-wide">+255 693 099 999</p>
                        <p class="text-lg md:text-xl font-bold text-opes-text-main tracking-wide">+255 222 774 966</p>
                    </div>
                </div>

                <div class="bg-white/5 p-6 md:p-8 rounded-xl flex items-start gap-4 md:gap-6 overflow-hidden">
                    <div class="text-opes-orange text-xl md:text-2xl mt-1"><i class="fa-solid fa-envelope"></i></div>
                    <div class="min-w-0 break-all sm:break-normal">
                        <h4 class="text-xs text-opes-text-gray mb-1">Direct Electronic Inquiries</h4>
                        <p class="text-lg md:text-xl font-bold text-opes-text-main tracking-wide">info@opestechnologies.co.tz</p>
                    </div>
                </div>

                <div class="bg-white/5 p-6 md:p-8 rounded-xl flex items-start gap-4 md:gap-6">
                    <div class="text-opes-cyan text-xl md:text-2xl mt-1"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4 class="text-xs text-opes-text-gray mb-1">Corporate HQ Location</h4>
                        <p class="text-sm md:text-base font-medium text-opes-text-main leading-relaxed">
                            246 Vikawe Street, Regent Estate<br>Dar es Salaam, Tanzania
                        </p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/opestechnologiesltd/" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-opesRed hover:text-white transition-all duration-300 border border-white/10 group">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://www.facebook.com/opestechnologiesltd" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-opesRed hover:text-white transition-all duration-300 border border-white/10 group">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>

                    <!-- Instagram -->
                    <a href="https://www.instagram.com/opestechnologies/" class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-opesRed hover:text-white transition-all duration-300 border border-white/10 group">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-white/5 mt-12 md:mt-16 pt-8 text-center text-xs md:text-sm text-opes-text-gray/60 leading-relaxed">
            &copy; {{ date('Y') }} OPES Technologies. Simplifying operations and accelerating digital growth for Tanzanian enterprises. All rights reserved.
        </div>
    </div>
</footer>
