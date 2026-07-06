<footer id="contact-section" class="bg-opes-darker border-t border-white/[0.05] pt-32 pb-16 relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">

        @if(session('success'))
            <div class="mb-12 p-5 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl max-w-4xl mx-auto flex items-center gap-3 backdrop-blur-md">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <p class="font-medium text-sm">{{ session('success') }}</p>
            </div>
        @endif

        <div class="text-center max-w-4xl mx-auto mb-20">
            <h2 class="text-3xl sm:text-5xl md:text-6xl mb-6 leading-tight">Simplify Your Business. <br><span class="text-gradient font-black">Talk to Us.</span></h2>
            <p class="text-base sm:text-lg text-opes-text-gray font-normal max-w-2xl mx-auto">
                Whatever challenge you're solving — a leaking fuel budget, a customer who can't get through, a spreadsheet doing an ERP's job — we'll show you exactly how to fix it on a single call.
            </p>
            <div class="inline-flex items-center gap-2 mt-8 px-4 py-2 bg-opes-orange/5 border border-opes-orange/10 rounded-full text-opes-orange text-[10px] uppercase tracking-widest font-black">
                <span class="w-1.5 h-1.5 bg-opes-orange rounded-full animate-ping"></span> Response Promise: Within 24 hours
            </div>
        </div>

        <!-- Capability Brochures Layer -->
        <div class="mb-24">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-white/[0.05] pb-6 mb-8 gap-4">
                <div>
                    <h3 class="text-sm font-heading font-black uppercase tracking-wider text-white">Company Brochures</h3>
                    <p class="text-xs text-opes-text-gray mt-1">Download strategic documents highlighting core service components.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Brochure Item: CRM & ERP -->
                <a href="{{ Vite::asset('resources/brochures/OPES_CRM&ERP.pdf') }}" target="_blank" class="group flex items-center gap-4 p-5 bg-opes-dark/30 hover:bg-opes-dark/60 border border-white/[0.05] hover:border-opes-cyan/30 rounded-2xl transition-all duration-500">
                    <div class="w-12 h-12 rounded-xl bg-opes-cyan/5 border border-opes-cyan/10 group-hover:border-opes-cyan/40 text-opes-cyan flex items-center justify-center text-xl transition-all duration-500 group-hover:scale-105">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[9px] text-opes-text-gray uppercase tracking-widest font-black">Architecture Blueprint</p>
                        <p class="text-sm font-bold text-white group-hover:text-opes-cyan transition-colors truncate mt-0.5">Custom CRM & ERP Systems</p>
                    </div>
                </a>

                <!-- Brochure Item: Customer Engagement -->
                <a href="{{ Vite::asset('resources/brochures/OPES_CUSTOMER_ENGAGEMENT.pdf') }}" target="_blank" class="group flex items-center gap-4 p-5 bg-opes-dark/30 hover:bg-opes-dark/60 border border-white/[0.05] hover:border-opes-orange/30 rounded-2xl transition-all duration-500">
                    <div class="w-12 h-12 rounded-xl bg-opes-orange/5 border border-opes-orange/10 group-hover:border-opes-orange/40 text-opes-orange flex items-center justify-center text-xl transition-all duration-500 group-hover:scale-105">
                        <i class="fa-solid fa-comments"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[9px] text-opes-text-gray uppercase tracking-widest font-black">High-Throughput Communications</p>
                        <p class="text-sm font-bold text-white group-hover:text-opes-orange transition-colors truncate mt-0.5">Enterprise Customer Engagement</p>
                    </div>
                </a>

                <!-- Brochure Item: Telematics -->
                <a href="{{ Vite::asset('resources/brochures/OPES_TELEMATICS.pdf') }}" target="_blank" class="group flex items-center gap-4 p-5 bg-opes-dark/30 hover:bg-opes-dark/60 border border-white/[0.05] hover:border-emerald-500/30 rounded-2xl transition-all duration-500">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/5 border border-emerald-500/10 group-hover:border-emerald-500/40 text-emerald-400 flex items-center justify-center text-xl transition-all duration-500 group-hover:scale-105">
                        <i class="fa-solid fa-satellite-dish"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[9px] text-opes-text-gray uppercase tracking-widest font-black">Telemetry Framework</p>
                        <p class="text-sm font-bold text-white group-hover:text-emerald-400 transition-colors truncate mt-0.5">Telematics & Asset Intelligence</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 md:gap-20 items-start">
            <!-- Modern Form Layout Container -->
            <div class="lg:col-span-7 bg-opes-dark/20 border border-white/[0.05] p-6 sm:p-10 rounded-2xl backdrop-blur-xl shadow-2xl relative overflow-hidden">
                <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-6 relative z-10">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Full Name</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" required class="w-full p-4 bg-white/[0.02] border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange focus:bg-opes-orange/[0.02] focus:ring-1 focus:ring-opes-orange/30" placeholder="Jamal Doe">
                            @error('full_name') <p class="text-opes-orange text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Company Entity</label>
                            <input type="text" name="company_name" value="{{ old('company_name') }}" required class="w-full p-4 bg-white/[0.02] border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange focus:bg-opes-orange/[0.02] focus:ring-1 focus:ring-opes-orange/30" placeholder="Business Enterprise">
                            @error('company_name') <p class="text-opes-orange text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Phone Vector</label>
                            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required placeholder="+255..." class="w-full p-4 bg-white/[0.02] border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange focus:bg-opes-orange/[0.02] focus:ring-1 focus:ring-opes-orange/30">
                            @error('phone_number') <p class="text-opes-orange text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full p-4 bg-white/[0.02] border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange focus:bg-opes-orange/[0.02] focus:ring-1 focus:ring-opes-orange/30" placeholder="jamal.doe@example.com">
                            @error('email') <p class="text-opes-orange text-xs mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Fleet Metric Size</label>
                            <select name="fleet_size" class="w-full p-4 bg-opes-dark/95 border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange">
                                <option value="Not Applicable" {{ old('fleet_size') == 'Not Applicable' ? 'selected' : '' }}>Not Applicable</option>
                                <option value="1-50" {{ old('fleet_size') == '1-50' ? 'selected' : '' }}>1 - 50 Assets</option>
                                <option value="51-200" {{ old('fleet_size') == '51-200' ? 'selected' : '' }}>51 - 200 Assets</option>
                                <option value="201+" {{ old('fleet_size') == '201+' ? 'selected' : '' }}>201+ Operational Fleets</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[10px] uppercase tracking-widest text-opes-text-gray font-bold mb-2">Core Vector Matrix</label>
                            <select name="service_interest" class="w-full p-4 bg-opes-dark/95 border border-white/[0.08] rounded-xl text-white text-sm transition-all duration-300 focus:outline-none focus:border-opes-orange">
                                <option value="Telematics" {{ old('service_interest') == 'Telematics' ? 'selected' : '' }}>Telematics & Fleet Intelligence</option>
                                <option value="Bulk SMS & AI" {{ old('service_interest') == 'Bulk SMS & AI' ? 'selected' : '' }}>Bulk Systems & Interactive AI</option>
                                <option value="CRM & ERP Engines" {{ old('service_interest') == 'CRM & ERP Engines' ? 'selected' : '' }}>Enterprise CRM & ERP Systems</option>
                                <option value="Consolidated Stack Integration" {{ old('service_interest') == 'Consolidated Stack Integration' ? 'selected' : '' }}>Complete Ecosystem Integration</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-full text-center mt-4">
                            Submit Form <i class="fa-solid fa-arrow-right-long ml-2 text-xs"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Context Info Layer -->
            <div class="lg:col-span-5 space-y-12 text-center lg:text-left">
                <div>
                    <h4 class="text-xs uppercase tracking-widest text-opes-text-gray font-black mb-4">Command Headquarters</h4>
                    <p class="text-sm text-white font-medium leading-relaxed">
                        246 Vikawe Street, Regent Estate <br />
                        Dar es Salaam, Tanzania
                    </p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-widest text-opes-text-gray font-black mb-4">Infrastructural Inquiries</h4>
                    <p class="text-sm text-white font-medium space-y-2">
                        <a href="mailto:info@opes.co.tz" class="block hover:text-opes-orange transition-colors duration-300">info@opes.co.tz</a>
                        <a href="https://wa.me/255798888997" class="block hover:text-opes-orange transition-colors duration-300">+255 798 888 997</a>
                    </p>
                </div>
                <div class="pt-8 border-t border-white/[0.05] flex justify-center lg:justify-start gap-4 text-opes-text-gray">
                    <a href="https://www.linkedin.com/company/opestechnologiesltd/" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:text-white hover:border-white transition-all duration-300"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="https://www.facebook.com/people/OPES-Technologies-Co-Ltd/61591351593058/" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:text-white hover:border-white transition-all duration-300"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/opestechnologies.co.ltd/" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:text-white hover:border-white transition-all duration-300"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@opestechnologies" class="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:text-white hover:border-white transition-all duration-300"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <div class="border-t border-white/[0.05] mt-24 pt-8 text-center flex flex-col sm:flex-row justify-between text-[11px] text-opes-text-gray/40 font-medium tracking-wider">
            <p>OPES TECHNOLOGIES</p>
            <p class="mt-2 sm:mt-0">ALL RIGHTS RESERVED &copy; {{ date('Y') }}</p>
        </div>
    </div>
</footer>
