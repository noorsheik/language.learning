<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Red Dashboard | Support Tickets</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif;
        }
        .table-row-transition {
            transition: all 0.2s ease-in-out;
        }
        .badge-pulse {
            animation: subtlePulse 1.5s infinite;
        }
        @keyframes subtlePulse {
            0% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.2); }
            70% { box-shadow: 0 0 0 6px rgba(220, 38, 38, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 38, 38, 0); }
        }
        .custom-scroll::-webkit-scrollbar {
            height: 6px;
            width: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: #dc2626;
            border-radius: 10px;
        }
        .red-glow {
            box-shadow: 0 8px 20px -8px rgba(220, 38, 38, 0.4);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-red-950 via-red-900 to-red-800 min-h-screen font-sans antialiased">

    <x-nav></x-nav>
>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12">
        
        <div class="mb-8 md:mb-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3">
                    <div class="bg-red-500/20 p-2 rounded-2xl backdrop-blur-sm">
                        <i class="fas fa-inbox text-3xl text-red-200"></i>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white drop-shadow-md">
                            My Support Tickets
                        </h1>
                        <p class="text-red-200/80 text-sm mt-1 flex items-center gap-2">
                            <i class="fas fa-comment-dots text-xs"></i> 
                            Track all your conversations and responses
                        </p>
                    </div>
                </div>
            </div>
       
            <a href="/contact" class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-500 text-white font-semibold py-2.5 px-5 rounded-xl transition-all duration-200 shadow-lg hover:shadow-red-700/30 hover:-translate-y-0.5 transform border border-red-400/30">
                <i class="fas fa-plus-circle text-sm"></i>
                <span>New Message</span>
                <i class="fas fa-arrow-right text-xs ml-1"></i>
            </a>
        </div>

    
        @php
            $userEmail = Session::get('email');
            $userMessages = isset($contacts) ? $contacts->where('email', $userEmail) : collect();
            $totalMessages = $userMessages->count();
            $pendingCount = $userMessages->filter(function($c) { return empty($c->response); })->count();
        @endphp
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-10">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-red-300/30 p-5 flex items-center gap-4 shadow-lg">
                <div class="bg-red-500/30 p-3 rounded-full">
                    <i class="fas fa-envelope-open-text text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-red-100 text-sm font-medium uppercase tracking-wide">Total Messages</p>
                    <p class="text-3xl font-bold text-white">{{ $totalMessages }}</p>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-red-300/30 p-5 flex items-center gap-4 shadow-lg">
                <div class="bg-amber-500/40 p-3 rounded-full">
                    <i class="fas fa-hourglass-half text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-red-100 text-sm font-medium uppercase tracking-wide">Pending Response</p>
                    <p class="text-3xl font-bold text-white">{{ $pendingCount }}</p>
                </div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl border border-red-300/30 p-5 flex items-center gap-4 shadow-lg">
                <div class="bg-emerald-500/40 p-3 rounded-full">
                    <i class="fas fa-check-circle text-white text-xl"></i>
                </div>
                <div>
                    <p class="text-red-100 text-sm font-medium uppercase tracking-wide">Resolved / Answered</p>
                    <p class="text-3xl font-bold text-white">{{ $totalMessages - $pendingCount }}</p>
                </div>
            </div>
        </div>

   
        <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl red-glow overflow-hidden border border-red-200/50 transition-all duration-300">
            <div class="overflow-x-auto custom-scroll">
                <table class="min-w-full divide-y divide-red-100">
                    <thead class="bg-gradient-to-r from-red-700 to-red-800">
                        <tr>
                            <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-user mr-2"></i> Name
                            </th>
                            <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-envelope mr-2"></i> Email
                            </th>
                            <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-tag mr-2"></i> Subject
                            </th>
                            <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-comment mr-2"></i> Message
                            </th>
                            <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-white uppercase tracking-wider">
                                <i class="fas fa-reply-all mr-2"></i> Response
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-red-100">
                        @php
                            $hasUserMessages = false;
                        @endphp
                        @foreach($contacts as $c)
                            @if($c->email == Session::get('email'))
                                @php $hasUserMessages = true; @endphp
                                <tr class="hover:bg-red-50 transition-colors duration-150 group table-row-transformation">
                                    <!-- Name Column with icon -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-9 w-9 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold">
                                                {{ substr($c->name, 0, 1) }}
                                            </div>
                                            <div class="ml-3">
                                                <div class="text-sm font-semibold text-gray-800">{{ $c->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                               
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-700 truncate max-w-[180px] md:max-w-xs" title="{{ $c->email }}">
                                            <i class="fas fa-envelope-open-text text-red-400 mr-1 text-xs"></i> {{ $c->email }}
                                        </div>
                                    </td>
                                 
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-800 flex items-center gap-1">
                                            <span class="inline-block w-2 h-2 rounded-full bg-red-500"></span>
                                            {{ Str::limit($c->subject, 35) }}
                                        </div>
                                    </td>
                          
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-[220px] md:max-w-xs truncate" title="{{ $c->message }}">
                                            <i class="fas fa-quote-left text-red-300 text-xs mr-1"></i> {{ Str::limit($c->message, 50) }}
                                        </div>
                                    </td>
                                    
                                    <td class="px-6 py-4">
                                        @if(empty($c->response))
                                            <div class="flex flex-col gap-1">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700 w-fit">
                                                    <i class="fas fa-clock animate-pulse text-red-500"></i> Pending
                                                </span>
                                                <span class="text-xs text-gray-400 italic">No response yet</span>
                                            </div>
                                        @else
                                            <div class="flex flex-col gap-1.5">
                                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-700 w-fit">
                                                    <i class="fas fa-check-circle"></i> Responded
                                                </span>
                                                <div class="text-sm text-gray-700 bg-gray-50 p-2 rounded-lg max-w-[220px] md:max-w-xs border-l-3 border-red-400 shadow-sm" title="{{ $c->response }}">
                                                    <i class="fas fa-reply text-red-500 mr-1 text-xs"></i> {{ Str::limit($c->response, 60) }}
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        
                        @if(!$hasUserMessages)
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center gap-4">
                                        <div class="bg-red-50 p-4 rounded-full">
                                            <i class="fas fa-inbox text-5xl text-red-300"></i>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-700">No messages found</h3>
                                        <p class="text-gray-500 text-sm">You haven't submitted any support requests yet.</p>
                                        <a href="/Contact_Us" class="mt-2 inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-xl transition shadow-md">
                                            <i class="fas fa-pen-alt"></i> Send your first message
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            @if($hasUserMessages)
                <div class="bg-red-50/40 px-6 py-3 border-t border-red-100 text-xs text-gray-500 flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-shield-alt text-red-400"></i>
                        <span>Your conversations are secure & encrypted</span>
                    </div>
                    <div class="text-red-400">
                        <i class="fas fa-chevron-circle-down"></i>
                    </div>
                </div>
            @endif
        </div>
        
  
        <div class="mt-8 text-center text-red-200/50 text-xs flex items-center justify-center gap-2">
            <i class="fas fa-heartbeat text-red-300/60"></i>
            <span>Red support dashboard • real-time ticket tracking</span>
        </div>
    </main>
    
    <style>
        /* extra micro-interactions */
        .group:hover .table-row-transformation {
            transform: scale(1.01);
        }
        td, th {
            transition: background 0.1s ease;
        }
        .border-l-3 {
            border-left-width: 3px;
            border-left-color: #dc2626;
        }
    </style>
</body>
</html>