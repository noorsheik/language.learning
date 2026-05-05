<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>RubyRate | Elegant Reviews</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom red-glow and rating star enhancements (no JS) */
        body {
            font-family: 'Inter', sans-serif;
        }
        .rating-card {
            transition: all 0.2s ease;
        }
        .rating-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px -12px rgba(220, 38, 38, 0.25);
        }
        /* pure css custom select arrow styling (red accent) */
        .custom-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23dc2626'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em;
            appearance: none;
        }
        .custom-select:focus {
            border-color: #dc2626;
            ring: 2px solid #fee2e2;
        }
        /* subtle red underline animation */
        .red-underline {
            position: relative;
        }
        .red-underline:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 70px;
            height: 3px;
            background: linear-gradient(90deg, #dc2626, #f97316);
            border-radius: 4px;
        }
        /* custom radio stars for rating display in cards (no JS) */
        .star-filled {
            color: #dc2626;
        }
        .star-empty {
            color: #e5e7eb;
        }
        /* red glow effect on form elements */
        input:focus, textarea:focus, select:focus {
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
            border-color: #dc2626;
            outline: none;
        }
        /* red gradient button */
        .btn-red-grad {
            background: linear-gradient(95deg, #dc2626 0%, #b91c1c 100%);
            transition: all 0.25s;
        }
        .btn-red-grad:hover {
            background: linear-gradient(95deg, #b91c1c 0%, #991b1b 100%);
            transform: scale(0.98);
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-100 antialiased">

<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        >
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 bg-red-50 text-red-700 px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm">
                <i class="fas fa-heart text-red-500 text-xs"></i>
                <span>share your voice</span>
                <i class="fas fa-star text-red-400 text-xs"></i>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mt-5 tracking-tight text-gray-900">
                Rate <span class="text-red-600">our experience</span>
            </h1>
            <div class="red-underline w-fit mx-auto mt-3"></div>
            <p class="text-gray-500 max-w-2xl mx-auto mt-5 text-lg">Your feedback fuels excellence — every rating tells a story.</p>
        </div>

        <div class="flex flex-col xl:flex-row gap-10">
    
            <div class="flex-1 space-y-6">
                <div class="flex items-center justify-between border-b border-red-100 pb-3">
                    <h2 class="text-2xl font-bold flex items-center gap-2 text-gray-800">
                        <i class="fas fa-comment-dots text-red-500"></i> 
                        Recent ratings
                    </h2>
                    <span class="bg-red-100 text-red-700 text-sm font-semibold px-3 py-1 rounded-full">
                        <i class="fas fa-star mr-1"></i> 
                        {{ $rates->count() ?? 0 }} reviews
                    </span>
                </div>

                @if(isset($rates) && count($rates) > 0)
                    @foreach($rates as $rating)
                        <div class="rating-card bg-white rounded-2xl shadow-md border-l-8 border-red-500 p-5 transition-all duration-200 hover:shadow-red-100/40">
                            <div class="flex items-start justify-between flex-wrap gap-3">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-red-600 font-bold text-xl shadow-inner">
                                        {{ strtoupper(substr($rating->email ?? 'U', 0, 1)) }}
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800 text-lg">{{ $rating->email ?? 'Anonymous' }}</h3>
                                        <div class="flex items-center gap-1 mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= ($rating->rate ?? 0))
                                                    <i class="fas fa-star text-red-500 text-sm"></i>
                                                @else
                                                    <i class="far fa-star text-gray-300 text-sm"></i>
                                                @endif
                                            @endfor
                                            <span class="text-xs text-gray-400 ml-2">{{ $rating->created_at?->diffForHumans() ?? 'recent' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-red-50 px-3 py-1 rounded-full">
                                    <span class="text-red-600 font-semibold text-sm">{{ $rating->rate ?? 0 }}/5</span>
                                </div>
                            </div>
                            @if(!empty($rating->feedback))
                                <div class="mt-4 pl-4 border-l-2 border-red-200">
                                    <p class="text-gray-600 italic leading-relaxed">“{{ $rating->feedback }}”</p>
                                </div>
                            @endif
                            <div class="mt-3 flex gap-3 text-xs text-gray-400">
                                <span><i class="far fa-calendar-alt text-red-300"></i> {{ $rating->created_at?->format('M d, Y') ?? 'Just now' }}</span>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Sample rating placeholders (show when no data, purely illustrative) -->
                    <div class="rating-card bg-white rounded-2xl shadow-md border-l-8 border-red-500 p-5">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold text-xl">E</div>
                                <div>
                                    <h3 class="font-bold text-gray-800">Elena Cruz</h3>
                                    <div class="flex items-center gap-1 mt-1">
                                        <i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="far fa-star text-gray-300"></i>
                                        <span class="text-xs text-gray-400 ml-2">2 days ago</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-red-50 px-3 py-1 rounded-full"><span class="text-red-600 font-semibold">4/5</span></div>
                        </div>
                        <div class="mt-4 pl-4 border-l-2 border-red-200"><p class="text-gray-600 italic">“Absolutely stunning experience! The team was so responsive and creative.”</p></div>
                    </div>
                    <div class="rating-card bg-white rounded-2xl shadow-md border-l-8 border-red-500 p-5">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold text-xl">M</div>
                                <div>
                                    <h3 class="font-bold text-gray-800">Marcus Velez</h3>
                                    <div class="flex items-center gap-1 mt-1"><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><i class="fas fa-star text-red-500"></i><span class="text-xs text-gray-400 ml-2">1 week ago</span></div>
                                </div>
                            </div>
                            <div class="bg-red-50 px-3 py-1 rounded-full"><span class="text-red-600 font-semibold">5/5</span></div>
                        </div>
                        <div class="mt-4 pl-4 border-l-2 border-red-200"><p class="text-gray-600 italic">“Flawless design & support. Highly recommended!”</p></div>
                    </div>
                    <div class="text-center text-sm text-gray-400 bg-white/50 rounded-xl p-4 mt-2">
                        <i class="fas fa-database text-red-300 mr-1"></i> Your Laravel ratings will appear here dynamically.
                    </div>
                @endif
            </div>

          
            <div class="xl:w-2/5 w-full">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-red-100 sticky top-8">
                    <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-5">
                        <div class="flex items-center gap-3 text-white">
                            <i class="fas fa-pen-fancy text-2xl"></i>
                            <h2 class="text-2xl font-bold tracking-tight">Add your rating</h2>
                        </div>
                        <p class="text-red-100 text-sm mt-1">Tell us about your journey — we value every star.</p>
                    </div>

                    <div class="p-6 md:p-8">
           
                        <form method="POST" action="/rate" class="space-y-6">
                            @csrf
                            

                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5 flex items-center gap-1">
                                    <i class="fas fa-user text-red-400 text-xs"></i> Your Email
                                </label>
                                <input type="text" id="email" name="email" value="email" required
                                    class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-red-400 transition bg-gray-50 focus:bg-white"
                                    placeholder="e.g., Jessica Parker">
                                @error('Email')
                                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1"><i class="fas fa-circle-exclamation"></i> {{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Rating select (beautiful red themed dropdown) NO JS needed -->
                            <div>
                                <label for="rating" class="block text-sm font-semibold text-gray-700 mb-1.5 flex items-center gap-1">
                                    <i class="fas fa-star text-red-400"></i> Your rating <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select id="rating" name="rating" required class="custom-select w-full px-5 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 focus:border-red-400 text-gray-800 appearance-none cursor-pointer">
                                        <option value="" disabled {{ old('rating') ? '' : 'selected' }}>Select a rating</option>
                                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ - Excellent (5/5)</option>
                                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ - Very Good (4/5)</option>
                                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>⭐⭐⭐ - Average (3/5)</option>
                                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>⭐⭐ - Fair (2/5)</option>
                                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>⭐ - Poor (1/5)</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-red-500">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                @error('rating')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Review comment -->
                            <div>
                                <label for="comment" class="block text-sm font-semibold text-gray-700 mb-1.5 flex items-center gap-1">
                                    <i class="fas fa-comment text-red-400"></i> Your feedback (optional)
                                </label>
                                <textarea id="comment" name="comment" rows="4"
                                    class="w-full px-5 py-3 border-2 border-gray-200 rounded-xl focus:border-red-400 transition bg-gray-50 focus:bg-white resize-none"
                                    placeholder="Share your experience...">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                           
                            <div class="pt-2">
                                <button type="submit" class="btn-red-grad w-full text-white font-bold py-3.5 rounded-xl shadow-lg flex items-center justify-center gap-3 transition-all">
                                    <i class="fas fa-paper-plane"></i> 
                                    Submit rating
                                    <i class="fas fa-heart text-white/80 text-xs"></i>
                                </button>
                                <p class="text-center text-xs text-gray-400 mt-3 flex items-center justify-center gap-1">
                                    <i class="fas fa-lock text-red-300"></i> Secure & anonymous option · No JavaScript required
                                </p>
                            </div>

                         
                            @if(session('success'))
                                <div class="bg-red-50 border-l-4 border-red-500 p-3 rounded-lg text-red-700 text-sm flex gap-2 items-center">
                                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
            
                    <div class="h-2 bg-gradient-to-r from-red-200 via-red-300 to-red-100"></div>
                </div>

            
                <div class="mt-6 flex items-center justify-center gap-3 text-xs text-gray-500 bg-white/60 p-3 rounded-xl shadow-sm backdrop-blur-sm">
                    <div class="w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                    <span><i class="fas fa-fire text-red-400"></i> 98% of guests recommend us</span>
                    <div class="w-px h-4 bg-red-200"></div>
                    <span><i class="fas fa-gem text-red-300"></i> Trusted ratings</span>
                </div>
            </div>
        </div>

        
        <div class="mt-20 text-center border-t border-red-100 pt-8">
            <div class="flex justify-center gap-2 text-red-300 mb-3">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-heart"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            </div>
            <p class="text-gray-400 text-sm">Powered by Laravel · Real voices, real impact</p>
            <p class="text-xs text-gray-300 mt-1">Every rating helps us craft better experiences ✨</p>
        </div>
    </div>
</div>


</body>
</html>