<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Listening Lab | Expert's Corner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        /* subtle floating animation for card */
        @keyframes gentleFloat {
            0% { transform: translateY(0px); }
            100% { transform: translateY(-5px); }
        }
        .card-hover-effect {
            transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        }
        .card-hover-effect:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.25);
        }
        /* custom focus ring for accessibility */
        .focus-ring:focus {
            outline: none;
            ring: 2px solid #3b82f6;
            ring-offset: 2px;
        }
        /* audio player subtle customization */
        audio::-webkit-media-controls-panel {
            background-color: #f8fafc;
            border-radius: 1rem;
        }
    </style>
</head>
<body class="antialiased">
       @if (session('message3211'))
        <div class="flex justify-center bg-black">
            <div class="alert alert-info bg-blue-100 border border-red-500 text-red-800 p-4 rounded-lg shadow-md w-1/2 text-center">
                {{ session('message3211') }}
            </div>
        </div>
    @endif

    <div class="relative flex items-center justify-center min-h-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url(''); background-color: #9a1919;">
        
        <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-black/40 to-black/50 backdrop-blur-[2px]"></div>
        
        <div class="relative z-10 w-full max-w-lg mx-4 sm:mx-6 md:max-w-2xl lg:max-w-xl">
            <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl overflow-hidden transition-all duration-300 card-hover-effect border border-white/20">
                
                <div class="relative px-6 pt-6 pb-2 sm:px-8 sm:pt-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="bg-gradient-to-br from-red-500 to-red-600 p-2 rounded-xl shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.5L12 4l9 5.5M12 4v16m-7-5.5L12 20l7-5.5M3 9.5v6l9 5.5m-9-5.5L12 20" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12l9-5.5M12 12v6m-7-3l7 3.5m0-9.5l7 3.5" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl sm:text-3xl font-bold tracking-tight bg-gradient-to-r from-gray-800 to-gray-900 bg-clip-text text-transparent">Expert's Speech</h1>
                                <p class="text-sm text-gray-500 mt-0.5 font-medium">Precision listening challenge</p>
                            </div>
                        </div>
                        <div class="hidden sm:flex items-center gap-1 bg-red-50 px-3 py-1.5 rounded-full">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            <span class="text-xs font-medium text-red-700">Audio ready</span>
                        </div>
                    </div>
                    <div class="h-1 w-20 bg-gradient-to-r from-red-500 to-red-400 rounded-full mt-4"></div>
                </div>

                <div class="px-6 pb-8 sm:px-8 sm:pb-10">
                    <div class="mb-8 mt-2 bg-gray-50/80 rounded-xl p-4 border border-gray-100 shadow-inner">
                        <div class="flex items-center gap-3 text-gray-600 text-sm font-medium mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 tex-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 010 12.728" />
                            </svg>
                            <span>🎧 Listen carefully to the expert's message</span>
                        </div>
                        <audio controls class="w-full rounded-lg focus:outline-none" style="border-radius: 12px;">
                            <source src="{{asset('audio/20260410_135301.aac')}}" type="audio/aac">
                            <source src="{{asset('audio/20260410_135301.aac')}}" type="audio/mpeg">
                            Your browser does not support the audio element. Please upgrade.
                        </audio>
                        <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            High‑quality recording · Play & transcribe
                        </p>
                    </div>

             
                    <form action="/Amain/listen" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-2">
                            <label for="listeningInput" class="block text-gray-800 font-semibold text-base sm:text-lg flex items-center gap-2">
                                <span class="bg-blue-100 text-red-700 rounded-full w-6 h-6 inline-flex items-center justify-center text-xs font-bold">?</span>
                                What did you hear?
                            </label>
                            <p class="text-sm text-gray-500 -mt-1 mb-1">Type the exact phrase or key idea you understood</p>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="option1" id="listeningInput"
                                       class="w-full pl-10 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-800 placeholder-gray-400 focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                       placeholder="e.g., 'The future of AI depends on collaboration...' or your interpretation"
                                       autocomplete="off">
                            </div>
                            <div class="text-right text-xs text-gray-400 flex justify-end items-center gap-1">
                                <span>✨</span> 
                                <span>Your answer helps improve comprehension</span>
                            </div>
                        </div>

              
                        <button type="submit" 
                                class="group relative w-full flex justify-center items-center gap-2 bg-gradient-to-r from-red-600 to-indigo-600 hover:from-red-700 hover:to-indigo-700 text-white font-semibold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Submit answer
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>

        
                    <div class="mt-8 pt-4 border-t border-gray-100 flex flex-wrap items-center justify-between gap-3 text-xs text-gray-400">
                        <div class="flex items-center gap-2">
                            <div class="bg-gray-100 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                            </div>
                            <span>Listen twice if needed · be specific</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1"><span class="text-red-500">⏺</span> Real‑time evaluation</span>
                        </div>
                    </div>
                </div>
            </div>
            
       
            <div class="text-center mt-5 text-white/60 text-xs backdrop-blur-sm px-4 py-2 rounded-full inline-block w-auto mx-auto block">
                🎙️ Linguistic accuracy lab · powered by expert insights
            </div>
        </div>
    </div>

   
    <script>
        // optional: just to add a little interactive console info for design (no intrusive)
        (function() {
            const inputField = document.getElementById('listeningInput');
            if(inputField) {
                inputField.addEventListener('keypress', function(e) {
                    if(e.key === 'Enter' && !e.shiftKey) {
                        e.preventDefault();
                        const form = this.closest('form');
                        if(form) form.submit();
                    }
                });
            }
            console.log("✨ Listening Lab UI enhanced — clean design ready");
        })();
    </script>
</body>
</html>