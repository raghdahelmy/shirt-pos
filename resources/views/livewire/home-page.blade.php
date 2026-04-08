<div class="bg-white min-h-screen font-sans">
    <div class="relative bg-gray-900 h-[600px] overflow-hidden rounded-b-[50px] shadow-2xl">
        <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?auto=format&fit=crop&q=80&w=1600"
             class="absolute inset-0 w-full h-full object-cover opacity-50" alt="Premium Shirts Background">

        <div class="relative max-w-7xl mx-auto px-6 h-full flex flex-col justify-center items-start text-left">
            <span class="text-blue-400 font-bold tracking-[0.3em] uppercase mb-4">New Collection 2026</span>
            <h1 class="text-6xl md:text-8xl font-black text-white leading-tight mb-6">
                Tailored <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-500">Perfection.</span>
            </h1>
            <p class="text-gray-300 text-xl max-w-xl mb-10 leading-relaxed font-light">
                Experience the luxury of custom-made shirts. Every stitch, designed by you, crafted by masters.
            </p>
            <div class="flex space-x-6">
                <a href="#collections" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-5 rounded-full font-bold text-lg transition-all transform hover:scale-105 shadow-xl shadow-blue-600/30">
                    Start Customizing
                </a>
                <a href="#collections" class="border-2 border-white/30 hover:border-white text-white px-10 py-5 rounded-full font-bold text-lg transition-all">
                    View Catalog
                </a>
            </div>
        </div>
    </div>

    <div id="collections" class="max-w-7xl mx-auto px-6 py-24">
        <div class="flex justify-between items-end mb-12 border-b border-gray-100 pb-8 text-left">
            <div>
                <h2 class="text-4xl font-black text-gray-900 mb-2">Editor's Choice</h2>
                <p class="text-gray-500">Our most popular styles, ready for your touch.</p>
            </div>
            <a href="#" class="text-blue-600 font-bold hover:underline group">
                Explore All Products <span class="group-hover:translate-x-2 transition-transform inline-block">→</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @forelse($indexProducts as $product)
                <div class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-3xl mb-4 bg-gray-100 aspect-[3/4] shadow-sm text-left">
                        
                        <img src="{{$product->image ? Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image):'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1920px-No-Image-Placeholder.svg.png' }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                             alt="{{ $product->name }}">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                            <a href="/customize/{{ $product->id }}" class="w-full bg-white text-gray-900 py-3 rounded-xl text-center font-bold shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                Customize Now
                            </a>
                        </div>
                    </div>

                    <h4 class="font-bold text-lg text-gray-800 text-left">{{ $product->name }}</h4>
                    <p class="text-blue-600 font-semibold text-left">{{ number_format($product->base_price, 0) }} EGP</p>
                </div>
            @empty
                <div class="col-span-4 py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                    <p class="text-gray-400">No products found. Add some from the dashboard.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>