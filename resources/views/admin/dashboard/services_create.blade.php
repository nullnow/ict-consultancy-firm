@extends('layouts.dashboard')

@section('main_content')
<div class="max-w-4xl mx-auto space-y-8">

    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-dash-accent-blue-light hover:underline">
            <i class="fa-solid fa-arrow-left mr-2"></i>Return to Dashboard
        </a>
    </div>

    <div class="bg-dash-surface p-8 rounded-xl space-y-6">
        <div>
            <h2 class="text-2xl text-white">Add New Service</h2>
            <p class="text-xs text-dash-muted uppercase tracking-widest mt-1">Create new service item. All fields populate front-end content directly.</p>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Display Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Bulk SMS & Email" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('title') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">URL Routing Slug (Alpha-Dash Only)</label>
                    <input type="text" name="slug" value="{{ old('slug') }}" placeholder="e.g., bulk-sms-email" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Headline</label>
                    <input type="text" name="headline" value="{{ old('headline') }}" placeholder="e.g., Ultimate Scalable Communication Platform" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('headline') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Hook / Strapline text</label>
                    <input type="text" name="strapline" value="{{ old('strapline') }}" placeholder="e.g., Reach instantly. Engage intelligently." class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('strapline') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Benefit Highlight (Results Summary)</label>
                    <input type="text" name="results_summary" value="{{ old('results_summary') }}" placeholder="e.g., Average fuel savings of 30%" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('results_summary') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">FontAwesome Icon Class Architecture</label>
                    <input type="text" name="icon_class" value="{{ old('icon_class', 'fa-solid fa-gear') }}" placeholder="e.g., fa-solid fa-comment-sms" required class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    @error('icon_class') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Marketplace Structural Positioning Paragraph (Message)</label>
                <textarea name="message" rows="4" placeholder="Describe the structural operational problem this platform system solves for the Tanzanian market..." class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">{{ old('message') }}</textarea>
                @error('message') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <hr class="border-white/10 my-6">

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg text-white font-medium">Platform Solutions</h3>
                        <p class="text-xs text-dash-muted uppercase tracking-wider">Map key targeted solutions containing localized titles and structural descriptions.</p>
                    </div>
                    <button type="button" id="add-solution-btn" class="px-3 py-1.5 bg-white/5 hover:bg-white/10 border border-white/10 text-white text-xs uppercase tracking-wider rounded font-bold transition-all">
                        <i class="fa-solid fa-plus mr-1"></i> Add Solution
                    </button>
                </div>

                <div id="solutions-container" class="space-y-4">
                    </div>
            </div>

            <hr class="border-white/10 my-6">

            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg text-white font-medium">Features Architecture</h3>
                        <p class="text-xs text-dash-muted uppercase tracking-wider">Append zero to many rich feature matrices equipped with sequential list content items.</p>
                    </div>
                    <button type="button" id="add-feature-btn" class="px-3 py-1.5 bg-white/5 hover:bg-white/10 border border-white/10 text-white text-xs uppercase tracking-wider rounded font-bold transition-all">
                        <i class="fa-solid fa-plus mr-1"></i> Add Feature Block
                    </button>
                </div>

                <div id="features-container" class="space-y-6">
                    </div>
            </div>

            <hr class="border-white/10 my-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Call to Action Target Text</label>
                    <input type="text" name="call_to_action" value="{{ old('call_to_action') }}" placeholder="e.g., Deploy Enterprise Node Instantly" class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('call_to_action') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-2">Closing Core Line Summary</label>
                    <input type="text" name="closing_line" value="{{ old('closing_line') }}" placeholder="e.g., Zero setup fees apply for custom integrations." class="w-full p-4 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    @error('closing_line') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-gradient-to-r from-dash-accent-blue to-dash-accent-blue-light hover:opacity-90 text-white text-sm font-bold uppercase tracking-wider rounded transition-all shadow-md">
                    Save Service Details
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let solutionIndex = 0;
    let featureIndex = 0;

    const solutionsContainer = document.getElementById('solutions-container');
    const featuresContainer = document.getElementById('features-container');

    // --- Solution Dynamic Templates ---
    document.getElementById('add-solution-btn').addEventListener('click', function () {
        const html = `
            <div class="solution-item bg-dash-bg p-5 rounded border border-white/10 space-y-4 relative group transition-all">
                <button type="button" class="remove-solution text-red-400 hover:text-red-300 absolute top-4 right-4 text-sm opacity-60 hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-trash-can"></i>
                </button>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                    <div class="md:col-span-1">
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-1">Solution Title</label>
                        <input type="text" name="solutions[${solutionIndex}][title]" required placeholder="e.g., Enterprise Core Routing" class="w-full p-3 bg-dash-surface border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-1">Functional Operational Description</label>
                        <input type="text" name="solutions[${solutionIndex}][description]" required placeholder="e.g., Bridges local telecom APIs with standard unified REST systems seamlessly." class="w-full p-3 bg-dash-surface border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                </div>
            </div>
        `;
        solutionsContainer.insertAdjacentHTML('beforeend', html);
        solutionIndex++;
    });

    // --- Feature Dynamic Templates ---
    document.getElementById('add-feature-btn').addEventListener('click', function () {
        const html = `
            <div class="feature-item bg-dash-bg p-6 rounded-xl border border-white/10 space-y-4 relative group transition-all" data-feature-id="${featureIndex}">
                <div class="flex items-center justify-between border-b border-white/5 pb-3">
                    <span class="text-xs uppercase tracking-widest text-dash-accent-blue-light font-bold font-mono">Feature Matrix Setup</span>
                    <button type="button" class="remove-feature text-red-400 hover:text-red-300 text-xs uppercase tracking-wider font-bold inline-flex items-center gap-1">
                        <i class="fa-solid fa-trash-can"></i> Delete Feature
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-1">Feature Title</label>
                        <input type="text" name="features[${featureIndex}][title]" required placeholder="e.g., Core API Processing" class="w-full p-3 bg-dash-surface border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-1">Icon Architecture Class</label>
                        <input type="text" name="features[${featureIndex}][icon_class]" value="fa-solid fa-star" required class="w-full p-3 bg-dash-surface border border-white/10 rounded text-white text-sm font-mono focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                    <div>
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold mb-1">Sort Execution Order</label>
                        <input type="number" name="features[${featureIndex}][sort_order]" value="${featuresContainer.children.length}" required class="w-full p-3 bg-dash-surface border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                    </div>
                </div>

                <div class="bg-dash-surface p-4 rounded border border-white/5 mt-2 space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs uppercase tracking-wider text-dash-muted font-bold">Strict Sequential Content Items</label>
                        <button type="button" class="add-content-item-btn text-xs text-dash-accent-blue-light hover:underline inline-flex items-center gap-1 font-bold uppercase tracking-wide">
                            <i class="fa-solid fa-plus-circle"></i> Add Item
                        </button>
                    </div>
                    <div class="feature-content-list space-y-2">
                        </div>
                </div>
            </div>
        `;
        featuresContainer.insertAdjacentHTML('beforeend', html);

        // Auto-populate the first sub-content item input for structural UX completeness
        const freshFeatureBlock = featuresContainer.lastElementChild;
        addContentItem(freshFeatureBlock, featureIndex);

        featureIndex++;
    });

    // Helper Function to cleanly inject Sequential Content fields
    function addContentItem(featureBlockElement, parentIndex) {
        const targetList = featureBlockElement.querySelector('.feature-content-list');
        const itemHtml = `
            <div class="content-item flex items-center gap-3">
                <div class="text-dash-muted text-xs font-mono select-none">▪</div>
                <input type="text" name="features[${parentIndex}][content][]" required placeholder="Describe detailed feature capabilities or specifications item line..." class="flex-1 p-2.5 bg-dash-bg border border-white/10 rounded text-white text-sm focus:outline-none focus:border-dash-accent-blue-light">
                <button type="button" class="remove-content-item text-red-400 hover:text-red-300 p-2 transition-colors">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        `;
        targetList.insertAdjacentHTML('beforeend', itemHtml);
    }

    // --- Dynamic DOM Event Delegation Listeners ---
    document.addEventListener('click', function (e) {
        // Remove Solution Element Block
        if (e.target.closest('.remove-solution')) {
            e.target.closest('.solution-item').remove();
        }

        // Remove Feature Element Block
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.feature-item').remove();
        }

        // Add Nested Feature Content Sequential String Item
        if (e.target.closest('.add-content-item-btn')) {
            const featureBlock = e.target.closest('.feature-item');
            const parentIndex = featureBlock.getAttribute('data-feature-id');
            addContentItem(featureBlock, parentIndex);
        }

        // Remove Nested Feature Content Sequential String Item
        if (e.target.closest('.remove-content-item')) {
            e.target.closest('.content-item').remove();
        }
    });
});
</script>
@endsection
