<div class="font-sans antialiased" dir="ltr">

    <style>
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>

    {{-- ═══════════ SUCCESS SCREEN ═══════════ --}}
    @if($orderSuccess)
        <div class="min-h-screen flex flex-col items-center justify-center text-center p-10 bg-white">
            <div class="w-32 h-32 rounded-full bg-emerald-100 flex items-center justify-center mx-auto mb-8 ring-8 ring-emerald-50">
                <svg class="w-16 h-16 text-emerald-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h2 class="text-5xl font-black text-gray-900 mb-4">Order Submitted!</h2>
            <p class="text-gray-400 text-lg mb-10 leading-relaxed">
                Your order has been placed successfully.<br>We'll get to work right away.
            </p>
            <div class="bg-gray-900 text-white rounded-3xl px-10 py-6 mb-10 w-full max-w-sm shadow-2xl">
                <div class="flex items-center justify-between">
                    <div class="text-left">
                        <p class="text-gray-500 text-xs uppercase tracking-widest mb-1">Order Reference</p>
                        <p class="text-3xl font-black text-blue-400">#{{ str_pad($orderId, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div class="w-px h-14 bg-gray-700 mx-4"></div>
                    <div class="text-left">
                        <p class="text-gray-500 text-xs uppercase tracking-widest mb-2">Status</p>
                        <span class="inline-flex items-center gap-2 text-emerald-400 font-bold">
                            <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-pulse"></span>
                            Confirmed
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 w-full max-w-sm">
                <a href="/#collections" class="flex-1 text-center px-6 py-4 rounded-2xl bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold transition-all">
                    ← Back to Home
                </a>
                <a href="/#collections" class="flex-1 text-center px-6 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 text-white font-bold transition-all shadow-lg">
                    New Order
                </a>
            </div>
        </div>

    {{-- ═══════════ CUSTOMIZER ═══════════ --}}
    @elseif($product)

        <div style="display:flex; min-height:100vh;">

            {{-- ─── LEFT PANEL: Shirt Preview ─── --}}
            <aside style="
                width: 42%;
                background: #0f0f0f;
                position: sticky;
                top: 0;
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 20px;
                padding: 40px 32px;
                color: white;
                overflow: hidden;
            ">
                {{-- Background glow --}}
                <div style="position:absolute; width:320px; height:320px; border-radius:50%; background:radial-gradient(circle, rgba(99,102,241,0.12) 0%, transparent 70%); pointer-events:none;"></div>

                {{-- Product label --}}
                <p style="font-size:10px; letter-spacing:0.25em; color:#4b5563; text-transform:uppercase; font-weight:600;">
                    {{ $product->name }}
                </p>

                {{-- Shirt SVG --}}
                <div style="position:relative; filter: drop-shadow(0 40px 60px rgba(0,0,0,0.7));">
                    <svg viewBox="0 0 300 265" width="260" height="260" xmlns="http://www.w3.org/2000/svg">

                        {{-- Glow circle behind shirt --}}
                        <ellipse cx="150" cy="150" rx="100" ry="85"
                                 fill="rgba(255,255,255,0.04)"/>

                        {{-- Shadow offset layer --}}
                        <path d="M 120 30 C 115 45,100 55,85 52 L 30 75 L 55 115 L 85 95 L 85 240 L 215 240 L 215 95 L 245 115 L 270 75 L 215 52 C 200 55,185 45,180 30 C 170 50,150 60,120 30 Z"
                              fill="rgba(0,0,0,0.4)" transform="translate(4,8)"/>

                        {{-- Main shirt body --}}
                        <path d="M 120 30 C 115 45,100 55,85 52 L 30 75 L 55 115 L 85 95 L 85 240 L 215 240 L 215 95 L 245 115 L 270 75 L 215 52 C 200 55,185 45,180 30 C 170 50,150 60,120 30 Z"
                              style="fill:{{ $shirtHexColor }}; transition: fill 0.5s ease;"
                              stroke="rgba(255,255,255,0.25)"
                              stroke-width="1.5"/>

                        {{-- Sheen overlay --}}
                        <path d="M 120 30 C 115 45,100 55,85 52 L 30 75 L 55 115 L 85 95 L 85 155 Q 150 135 215 155 L 215 95 L 245 115 L 270 75 L 215 52 C 200 55,185 45,180 30 C 170 50,150 60,120 30 Z"
                              fill="rgba(255,255,255,0.07)"/>

                        {{-- Collar V --}}
                        <path d="M 122 33 L 150 78 L 178 33"
                              fill="none"
                              stroke="rgba(255,255,255,0.2)"
                              stroke-width="1.5" stroke-linecap="round"/>

                        {{-- Button placket --}}
                        <line x1="150" y1="78" x2="150" y2="240"
                              stroke="rgba(255,255,255,0.15)" stroke-width="1.5"/>

                        {{-- Buttons --}}
                        <circle cx="150" cy="100" r="4" fill="rgba(255,255,255,0.25)"/>
                        <circle cx="150" cy="128" r="4" fill="rgba(255,255,255,0.25)"/>
                        <circle cx="150" cy="156" r="4" fill="rgba(255,255,255,0.25)"/>
                        <circle cx="150" cy="184" r="4" fill="rgba(255,255,255,0.25)"/>
                        <circle cx="150" cy="212" r="4" fill="rgba(255,255,255,0.25)"/>

                        {{-- Sleeve seams --}}
                        <path d="M 85 95 L 55 115" stroke="rgba(255,255,255,0.12)" stroke-width="1" fill="none"/>
                        <path d="M 215 95 L 245 115" stroke="rgba(255,255,255,0.12)" stroke-width="1" fill="none"/>
                    </svg>
                </div>

                {{-- Selected option tags --}}
                <div style="display:flex; flex-wrap:wrap; gap:8px; justify-content:center; max-width:280px;">
                    @foreach($allAttributes as $attribute)
                        @php $optId = $selectedOptions[$attribute->id] ?? null; @endphp
                        @if($optId)
                            @php $opt = $attribute->options->firstWhere('id', $optId); @endphp
                            @if($opt)
                                <span style="font-size:11px; padding:5px 12px; border-radius:999px; background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.08); color:#9ca3af;">
                                    <span style="color:#4b5563;">{{ $attribute->name }}</span>: {{ $opt->value }}
                                </span>
                            @endif
                        @endif
                    @endforeach
                </div>

                {{-- Price --}}
                <div style="text-align:center; margin-top:4px;">
                    <p style="font-size:10px; letter-spacing:0.2em; color:#4b5563; text-transform:uppercase; margin-bottom:6px;">Total Price</p>
                    <div style="display:flex; align-items:flex-end; justify-content:center; gap:8px;">
                        <span style="font-size:52px; font-weight:900; color:#ffffff; line-height:1; letter-spacing:-2px;">{{ number_format($totalPrice) }}</span>
                        <span style="font-size:18px; color:#6b7280; margin-bottom:4px;">EGP</span>
                    </div>
                </div>

            </aside>

            {{-- ─── RIGHT PANEL: Form ─── --}}
            <main style="flex:1; background:#f8fafc; overflow-y:auto;">
                <div style="max-width:540px; margin:0 auto; padding:48px 32px;">

                    {{-- Header --}}
                    <div style="margin-bottom:40px;">
                        <a href="/" style="display:inline-flex; align-items:center; gap:6px; font-size:13px; color:#9ca3af; text-decoration:none; margin-bottom:28px; transition:color 0.2s;"
                           onmouseover="this.style.color='#374151'" onmouseout="this.style.color='#9ca3af'">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Collection
                        </a>
                        <h1 style="font-size:34px; font-weight:900; color:#111827; margin:0 0 6px;">Build Your Shirt</h1>
                        <p style="color:#9ca3af; font-size:15px; margin:0;">Pick your style, we'll craft it.</p>
                    </div>

                    {{-- Error --}}
                    @if(session()->has('error'))
                        <div style="background:#fef2f2; border:1px solid #fecaca; color:#dc2626; padding:12px 16px; border-radius:12px; margin-bottom:24px; font-size:14px;">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- ── Attributes ── --}}
                    @foreach($allAttributes as $attribute)
                        <div style="margin-bottom:32px;">
                            <p style="font-size:11px; font-weight:700; letter-spacing:0.18em; color:#9ca3af; text-transform:uppercase; margin-bottom:12px;">
                                {{ $attribute->name }}
                            </p>

                            {{-- Color → swatches --}}
                            @if(strtolower($attribute->name) === 'color')
                                <div style="display:flex; gap:14px; align-items:center; flex-wrap:wrap;">
                                    @foreach($attribute->options as $option)
                                        @php
                                            $swatchMap  = ['White'=>'#f8fafc','Blue'=>'#3b82f6','Pink'=>'#fbcfe8','Black'=>'#1e293b'];
                                            $hex        = $swatchMap[$option->value] ?? '#9ca3af';
                                            $isSelected = ($selectedOptions[$attribute->id] ?? '') == $option->id;
                                            $checkColor = in_array($option->value,['White','Pink']) ? '#374151' : '#ffffff';
                                        @endphp
                                        <button wire:click="selectOption({{ $attribute->id }}, {{ $option->id }})"
                                                title="{{ $option->value }}"
                                                style="
                                                    position:relative;
                                                    width:44px; height:44px;
                                                    border-radius:50%;
                                                    background:{{ $hex }};
                                                    border: {{ $option->value==='White' ? '2px solid #e2e8f0' : 'none' }};
                                                    outline: {{ $isSelected ? '3px solid #111827' : 'none' }};
                                                    outline-offset: 3px;
                                                    cursor:pointer;
                                                    transform: {{ $isSelected ? 'scale(1.18)' : 'scale(1)' }};
                                                    transition: all 0.2s;
                                                    box-shadow: {{ $isSelected ? '0 4px 12px rgba(0,0,0,0.2)' : '0 2px 6px rgba(0,0,0,0.1)' }};
                                                ">
                                            @if($isSelected)
                                                <span style="position:absolute; inset:0; display:flex; align-items:center; justify-content:center;">
                                                    <svg style="color:{{ $checkColor }}; width:18px; height:18px;" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>

                            {{-- Other → pill chips --}}
                            @else
                                <div style="display:flex; flex-wrap:wrap; gap:8px;">
                                    @foreach($attribute->options as $option)
                                        @php $isSelected = ($selectedOptions[$attribute->id] ?? '') == $option->id; @endphp
                                        <button wire:click="selectOption({{ $attribute->id }}, {{ $option->id }})"
                                                style="
                                                    padding: 10px 18px;
                                                    border-radius: 12px;
                                                    font-size: 14px;
                                                    font-weight: 600;
                                                    cursor: pointer;
                                                    transition: all 0.18s;
                                                    border: 2px solid {{ $isSelected ? '#111827' : '#e5e7eb' }};
                                                    background: {{ $isSelected ? '#111827' : '#ffffff' }};
                                                    color: {{ $isSelected ? '#ffffff' : '#4b5563' }};
                                                    box-shadow: {{ $isSelected ? '0 4px 12px rgba(0,0,0,0.15)' : 'none' }};
                                                ">
                                            {{ $option->value }}
                                            @if($option->price_modifier > 0)
                                                <span style="font-size:11px; opacity:0.55; margin-left:4px;">+{{ number_format($option->price_modifier) }}</span>
                                            @endif
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach

                    {{-- Divider --}}
                    <div style="border-top:2px solid #e5e7eb; margin:36px 0;"></div>

                    {{-- Customer Details --}}
                    <div style="margin-bottom:32px;">
                        <p style="font-size:11px; font-weight:700; letter-spacing:0.18em; color:#9ca3af; text-transform:uppercase; margin-bottom:20px;">
                            Your Details
                        </p>
                        <div style="display:flex; flex-direction:column; gap:14px;">
                            <div>
                                <input wire:model="customer_name" type="text" placeholder="Full Name"
                                       style="width:100%; box-sizing:border-box; border:2px solid {{ $errors->has('customer_name') ? '#f87171' : '#e5e7eb' }}; border-radius:14px; padding:14px 18px; font-size:15px; color:#111827; background:#ffffff; outline:none; transition:border-color 0.2s; font-family:inherit;"
                                       onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='{{ $errors->has('customer_name') ? '#f87171' : '#e5e7eb' }}'">
                                @error('customer_name') <p style="color:#ef4444; font-size:12px; margin:6px 0 0 4px;">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <input wire:model="customer_phone" type="text" placeholder="Phone Number"
                                       style="width:100%; box-sizing:border-box; border:2px solid {{ $errors->has('customer_phone') ? '#f87171' : '#e5e7eb' }}; border-radius:14px; padding:14px 18px; font-size:15px; color:#111827; background:#ffffff; outline:none; transition:border-color 0.2s; font-family:inherit;"
                                       onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='{{ $errors->has('customer_phone') ? '#f87171' : '#e5e7eb' }}'">
                                @error('customer_phone') <p style="color:#ef4444; font-size:12px; margin:6px 0 0 4px;">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <textarea wire:model="customer_address" placeholder="Delivery Address" rows="3"
                                          style="width:100%; box-sizing:border-box; border:2px solid {{ $errors->has('customer_address') ? '#f87171' : '#e5e7eb' }}; border-radius:14px; padding:14px 18px; font-size:15px; color:#111827; background:#ffffff; outline:none; transition:border-color 0.2s; resize:none; font-family:inherit;"
                                          onfocus="this.style.borderColor='#111827'" onblur="this.style.borderColor='{{ $errors->has('customer_address') ? '#f87171' : '#e5e7eb' }}'"></textarea>
                                @error('customer_address') <p style="color:#ef4444; font-size:12px; margin:6px 0 0 4px;">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button wire:click="submitOrder"
                            wire:loading.attr="disabled"
                            style="width:100%; background:#111827; color:#ffffff; font-weight:700; font-size:16px; padding:18px 24px; border-radius:16px; border:none; cursor:pointer; transition:all 0.2s; display:flex; align-items:center; justify-content:center; gap:10px; box-shadow:0 8px 24px rgba(0,0,0,0.2); font-family:inherit;"
                            onmouseover="this.style.background='#1f2937'" onmouseout="this.style.background='#111827'">
                        <span wire:loading.remove style="display:flex; align-items:center; gap:10px;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            Place Order &nbsp;·&nbsp; {{ number_format($totalPrice) }} EGP
                        </span>
                        <span wire:loading style="display:flex; align-items:center; gap:8px;">
                            <svg style="animation:spin 1s linear infinite; width:20px; height:20px;" fill="none" viewBox="0 0 24 24">
                                <circle style="opacity:0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path style="opacity:0.75;" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>

                    <p style="text-align:center; font-size:12px; color:#d1d5db; margin-top:16px;">
                        Secure checkout · No account required
                    </p>

                </div>
            </main>
        </div>

    {{-- ═══════════ NOT FOUND ═══════════ --}}
    @else
        <div style="min-height:100vh; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:40px;">
            <h3 style="font-size:24px; font-weight:700; color:#111827;">Product Not Found</h3>
            <p style="color:#9ca3af; margin-top:8px;">Please go back and select a valid product.</p>
            <a href="/" style="color:#2563eb; font-weight:700; margin-top:24px; display:inline-block;">← Back to Collection</a>
        </div>
    @endif

</div>

